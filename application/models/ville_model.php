<?php
/**
 * Created by PhpStorm.
 * User: Franky
 * Date: 29/04/14
 * Time: 19:54
 */
class Ville_model  extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    function get_ville_by_id($id_ville)
    {
        $this->db->select('ville.*')
            ->from('ville');
        $this->db->where('ville.NUMVILLE',$id_ville);
        $q=$this->db->get();
        if($q->num_rows()>0)
        {
            $row =$q->row();
            return $row;
        }

    }

    function get_ville_by_id_pays($id_pays)
    {

    }
    function get_all_ville()
    {
        $this->db->from('ville');
        $this->db->order_by("NOMVILLE","asc");
        $q=$this->db->get();

        if($q->num_rows()>0)
        {
            foreach($q->result() as $rows)
            {
                $data[]=$rows;
            }
            return $data;
        }

    }


    function get_ville_arrivee($country = null){
        $this->db->select('NUMVILLEARRIVEE, NOMVILLEARRIVEE')->from('villearrivee');
        $this->db->join('pays','pays.NUMPAYS=villearrivee.numpays');

        if($country != NULL){
            $this->db->where('pays.NUMPAYS', $country);
            $this->db->order_by("NOMVILLEARRIVEE","asc");

        }
        $this->db->order_by("NOMVILLEARRIVEE","asc");

        $query = $this->db->get();

        $cities = array();

        if($query->result()){
            foreach ($query->result() as $city) {
                $cities[$city->NUMVILLEARRIVEE] = $city->NOMVILLEARRIVEE;
            }

            return $cities;
        }else{
            return FALSE;
        }
    }



    function get_ville_depart($country = null){
        $this->db->select('NUMVILLEDEPART, NOMVILLEDEPART')->from('villedepart');
        $this->db->join('pays','pays.NUMPAYS=villedepart.numpays');
        $this->db->where('pays.NUMPAYS', $country);
        $this->db->order_by("NOMVILLEDEPART","asc");
        $query = $this->db->get();
        return $query;
        /*$cities = array();

        if($query->result()){
            foreach ($query->result() as $city) {
                $cities[$city->NUMVILLEDEPART] = $city->NOMVILLEDEPART;
            }
            return $cities;
        }else{
            return FALSE;
        }*/
    }


}