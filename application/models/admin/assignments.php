<?php

class assignments extends grocery_CRUD_Model  {

    /**
     * Get Pending
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_list()
    {
	    $ci =& get_instance();    
	    $results_array = array();      		
        $campaigns = Campaign::find('all', array('select'=>'b.id, c.id as "campaign_id", IF(c.pending, "pending", "approved") as "status", c.updated_at, 
                                                  b.stripe_access_token, IF(ISNULL(c.length), "n/a", c.length) as "campaign_length",
                                                  b.name as "name", 
                                                  b.short_url,u.name as "user_name", u.email, b.city, b.state, c.goal, c.end_date', 
                                    'from' => 'businesses as b, campaigns as c, users as u', 
                                    'conditions' => array('b.active = 0 AND c.pending = 1 AND b.stripe_access_token IS NULL
                                                           AND b.owner_id = u.id
                                                           AND b.id = c.business_id'), 'order'=>'c.created_at DESC' ) );


        foreach ($campaigns as $campaign ) {
            $results_array[] = (object)$campaign->to_array();
        }
        
        return $results_array;
    }

}