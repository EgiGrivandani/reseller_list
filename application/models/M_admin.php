<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	private function _updateProfile($data, $banner){

		$path       = 'assets/profile/';
		$default    = 'image.png';

		$config['upload_path']          = FCPATH . '/' . $path;
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['encrypt_name']         = true;
		$config['max_size']             = 3000; // 9MB

		$gambar_lama                    = $banner;
		$this->load->library('upload', $config);

		if ($data == 'image') {
			if ($gambar_lama != $default) {
				unlink($path . $gambar_lama);
			}
		}

		$this->upload->initialize($config);
		if (!empty($_FILES['image']['name'])) {
			if ($this->upload->do_upload($data)) {
				$file_name = $this->upload->data("file_name");

				$config['image_library']    = 'gd2';
				$config['source_image']     = $path . $file_name;
				$config['maintain_ratio']   = true;
				$config['width']            = 400;
				$config['height']           = 400;

				$this->load->library('image_lib', $config);

				if ($this->image_lib->resize()) {
					return $file_name;
				} else {
					unlink($path . $file_name);
					return $default;
				}
			} else {
				return $default;
			}
		} else {
			return $default;
		}

	}
	private function _deleteIMAGE($image){
		$path       = 'assets/profile/';
		$default    = 'image.png';
		if ($image != $default) {
			$full_path = FCPATH . $path . $image;
			if (file_exists($full_path)) {
				unlink($full_path);
			}
		}
	}


	public function email_get($email){
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('email', $email);
		return $this->db->get()->row();
	}

	public function country_get(){
		return $this->db->get('country_code')->result();
	}


	public function resellerList_get(){
		$this->db->select('r.*, c.alpha_2, c.name as flag');
		$this->db->from('reseller r');
		$this->db->join('country_code c', 'r.country=c.id');
		return $this->db->get()->result();
	}

	public function resellerById_get($id){
		$this->db->select('r.*');
		$this->db->from('reseller r');
		$this->db->where('r.id_reseller', $id);
		return $this->db->get()->row();
	}

	public function reseller_post(){
		$fname = $this->input->post('fname', true);
		$uname = $this->input->post('uname', true);
		$email = '-';
		$company = $this->input->post('company', true);
		$address = $this->input->post('address', true);
		$country = $this->input->post('country', true);

		$website = $this->input->post('website', true);
		$payment = $this->input->post('payment', true);
		$facebook = $this->input->post('facebook', true);
		$instagram = $this->input->post('instagram', true);
		$telegram = $this->input->post('telegram', true);
		$whatsapp = $this->input->post('whatsapp', true);
		$phone = $this->input->post('phone', true);


		$data = array(
			'name'	=> $fname,
			'unique_name' => strtolower($uname),
			'email' => $email,
			'company'	=> $company,
			'website'	=> $website,
			'payment_option'	=> $payment,
			'address'	=> $address,
			'facebook'	=> $facebook,
			'instagram'	=> $instagram,
			'telegram'	=> $telegram,
			'whatsapp'	=> $whatsapp,
			'phone_number'	=> $phone,
			'country'	=> $country
		);
		if (!empty($_FILES["image"]["name"])) {
			$image = 'image.png';
			$image   = $this->_updateProfile('image', $image);
			$data['image'] = $image;
		}
		return $this->db->insert('reseller', $data);
	}

	public function reseller_put(){
		$idInput = $this->input->post('idInput', true);
		$fname = $this->input->post('fname', true);
		$uname = $this->input->post('uname', true);
		$email = '-';
		$company = $this->input->post('company', true);
		$address = $this->input->post('address', true);
		$country = $this->input->post('country', true);

		$website = $this->input->post('website', true);
		$payment = $this->input->post('payment', true);
		$facebook = $this->input->post('facebook', true);
		$instagram = $this->input->post('instagram', true);
		$telegram = $this->input->post('telegram', true);
		$whatsapp = $this->input->post('whatsapp', true);
		$phone = $this->input->post('phone', true);

		$check = $this->resellerById_get($idInput);
		if($check){
			$data = array(
				'name'	=> $fname,
				'unique_name' => strtolower($uname),
				'email' => $email,
				'company'	=> $company,
				'website'	=> $website,
				'payment_option'	=> $payment,
				'address'	=> $address,
				'facebook'	=> $facebook,
				'instagram'	=> $instagram,
				'telegram'	=> $telegram,
				'whatsapp'	=> $whatsapp,
				'phone_number'	=> $phone,
				'country'	=> $country
			);
			if (!empty($_FILES["image"]["name"])) {
				$oldImage = $check->image;
				$image   = $this->_updateProfile('image', $oldImage);
				$data['image'] = $image;
			}

			$this->db->where('id_reseller', $idInput);
			return $this->db->update('reseller', $data);
		}else{
			return false;
		}
	}

	public function resellerStatus_put($id, $status){
		$this->db->set('status', $status);
		$this->db->where('id_reseller', $id);
		return $this->db->update('reseller');
	}

	public function reseller_del($id, $oldImage){
		$this->_deleteIMAGE( $oldImage);
		$this->db->where('id_reseller', $id);
		return $this->db->delete('reseller');
	}


	//=========================BANNER===========================
	private function _update_BANNER($data, $banner){

		$path       = 'assets/banner/';
		$default    = 'image.png';

		$config['upload_path']          = FCPATH . '/' . $path;
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['encrypt_name']         = true;
		$config['max_size']             = 3000; // 9MB

		$gambar_lama                    = $banner;
		$this->load->library('upload', $config);

		if ($data == 'image') {
			if ($gambar_lama != $default) {
				unlink($path . $gambar_lama);
			}
		}

		$this->upload->initialize($config);
		if (!empty($_FILES['image']['name'])) {
			if ($this->upload->do_upload($data)) {
				$file_name = $this->upload->data("file_name");

				$config['image_library']    = 'gd2';
				$config['source_image']     = $path . $file_name;
				$config['maintain_ratio']   = true;
				$config['width']            = 1100;
				$config['height']           = 400;

				$this->load->library('image_lib', $config);

				if ($this->image_lib->resize()) {
					return $file_name;
				} else {
					unlink($path . $file_name);
					return $default;
				}
			} else {
				return $default;
			}
		} else {
			return $default;
		}

	}
	private function _deleteIMAGE_BANNER($image){
		$path       = 'assets/banner/';
		$default    = 'image.png';
		if ($image != $default) {
			$full_path = FCPATH . $path . $image;
			if (file_exists($full_path)) {
				unlink($full_path);
			}
		}
	}
	public function banner_get()
	{
		return $this->db->get('banner')->result();
	}
	public function banner_post(){
		$fname = $this->input->post('fname', true);

		$data = array(
			'name'	=> $fname,
		);
		if (!empty($_FILES["image"]["name"])) {
			$image = 'image.png';
			$image   = $this->_update_BANNER('image', $image);
			$data['image'] = $image;
		}
		return $this->db->insert('banner', $data);
	}
	public function banner_put(){
		$idInput = $this->input->post('idInput', true);
		$fname = $this->input->post('fname', true);


		$check = $this->bannerById_get($idInput);
		if($check){
			$data = array(
				'name'	=> $fname,
			);
			if (!empty($_FILES["image"]["name"])) {
				$oldImage = $check->image;
				$image   = $this->_update_BANNER('image', $oldImage);
				$data['image'] = $image;
			}

			$this->db->where('id', $idInput);
			return $this->db->update('banner', $data);
		}else{
			return false;
		}
	}
	public function bannerById_get($id){
		$this->db->select('*');
		$this->db->from('banner');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}
	public function bannerStatus_put($id, $status){
		$this->db->set('status', $status);
		$this->db->where('id', $id);
		return $this->db->update('banner');
	}
	public function banner_del($id, $oldImage){
		$this->_deleteIMAGE_BANNER( $oldImage);
		$this->db->where('id', $id);
		return $this->db->delete('banner');
	}

}
