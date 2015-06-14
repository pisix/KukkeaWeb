<?php
class Utilisateur_facebook_model  extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function user_exists($fbk_user_id){
        $query = $this->db->get_where("utilisateursfbk",array('IDFBK'=>$fbk_user_id));
        $lines = $query->num_rows();
        return ($lines>0)?true:false;
    }

    public function add_user($first_name, $last_name, $fbk_user_id, $id_photo) {
        $user_fbk_data = array(
                            'IDFBK'             =>  $fbk_user_id,
                            'IDPHOTO'           =>  $id_photo,
                            'NOMUSER'           =>  $last_name,
                            'PRENOMUSER'        =>  $first_name,
                            'DATEINSCRIPTION'=>date('Y-m-d H:i:s', now())
                        );
        $this->db->insert('utilisateursfbk',$user_fbk_data);
    }

    public function get_user_by_id($id){
        $this->db->select('utilisateursfbk.*')
                 ->from('utilisateursfbk');
        $this->db->where('utilisateursfbk.IDFBK',$id);
        $q=$this->db->get();
        if($q->num_rows()>0){
            foreach($q->result() as $row){
                $data[]=$row;
            }
            return $data;
        }
        return array();
    }

    public function get_user_info_by_id($id){
        $this->db->select('utilisateursfbk.*,photo.*')
            ->from('utilisateursfbk');
        $this->db->join('photo', 'photo.IDPHOTO = utilisateursfbk.IDPHOTO');
        $this->db->where('utilisateursfbk.IDFBK',$id);

        $q=$this->db->get();
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                $data[]=$row;
            }
            return $data;
        }
    }
}