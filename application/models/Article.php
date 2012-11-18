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
        return $this->json->title;
    }
    
    /**
     * Author
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_author()
    {
        return isset($this->json->author) ?: 'n/a';
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
        return isset($this->json->date) ?: 'n/a';
    }
    
    /**
     * Primary Image
     *
     * @return void
     * @author Jason Punzalan
     **/
    public function get_primary_image()
    {        
        return $this->json->media[0]->link;
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