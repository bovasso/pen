<?php

class Article extends ActiveRecord\Model {
    private $ci = NULL;
    
    static $belongs_to = array('assignment');   
     
    
    public function __construct ($attributes=array(), $guard_attributes=TRUE, $instantiating_via_find=FALSE, $new_record=TRUE) {
        // Call the default Model constructor
        parent::__construct ($attributes, $guard_attributes, $instantiating_via_find, $new_record);
        
        $this->ci =& get_instance();        
    }
    
    /**
     * Title
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_title()
    {   
        if ( $this->read_attribute('title') ) return $this->read_attribute('title');
        
        return isset($this->json->title) ? $this->json->title : 'n/a';
    }
    
    /**
     * Author
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_author()
    {      
        if ( !is_null($this->author) )  return $this->author;
        return isset($this->json->author) ? $this->json->author : 'n/a';
    }
    
    /**
     * Abstract
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_abstract()
    {
        return word_limiter($this->content, 50);
    }
    
    /**
     * Date
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_date()
    {   
        if ( !is_null($this->date_of_article) )  return date('m/d/Y', strtotime($this->date_of_article));
        return !empty($this->json->date) ? date('m/d/Y', strtotime($this->json->date) ) : 'n/a';
    }
    
    /**
     * Primary Image
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_primary_image()
    {   
        if ( $this->custom_image ) return FALSE; // Has override so don't display default
             
        if ( isset( $this->json->media[0]->link ) ) return $this->json->media[0]->link;        
        return FALSE;
    } 
    
    /**
     * Checks for if Article has image
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_hasNoImage()
    {                             
        if ( $this->primary_image == NULL && $this->custom_image == NULL ) return TRUE;
        return FALSE;
    }
    /**
     * Content
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_content()
    {                                        
        if ( !empty($this->custom_article_content) ) {
            return html_purify($this->custom_article_content, 'comment');
        };

        return html_purify($this->json->html, 'comment');
    }
    
    /**
     * Raw API call 
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_json()
    {
        $json = $this->read_attribute('json');
        
        if ( empty($json) ) {
            $json = $this->ci->diffbot->getArticle($this->source);
            $this->update_attribute('json', $json->content);
        }
        
        return json_decode($json);
    }
}