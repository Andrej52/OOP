<?php

class Gallery extends Topic
{
    private $topic;
    public function __construct()
    {
        $this->topic= new Topic;
    }

    public function add($post)
    {
        $this->topic->add($post);
    }
    public function show($tablename)
    {
        $this->topic->databaseData($tablename);
        if ($this->topic->data != null) {
            foreach($this->topic->data as $key => $row)
            {
                echo "
                <section class='gallery-wrap'>
                <h1>{$row['header']}</h1>
                <div> <img src='{$row['images']}' alt='not found '> </div>
                <div>{$row['desc']}</div>
                </section>
                ";
            }
        }
    }

    public function manage($tablename)
    {
        $this->topic->management($tablename);
    }
}
