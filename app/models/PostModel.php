<?php

class PostModel extends ParentModel
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Will fetch posts from tbl_article
     *
     * @param string $table
     *
     * @return void
     */
    public function viewPosts($table)
    {
        $sql = "SELECT * FROM $table ";
        $sql.= "ORDER BY id DESC";
        return $this->dbHandler->select($sql);
    }
    /**
     * Select post by clicked post Id from tbl_article
     *
     * @param string $table
     * @param integer $postId
     *
     * @return mixed
     */
    public function showPostById($table, $postId)
    {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $data = ['id' => $postId];
        return $this->dbHandler->select($sql, $data) ;
    }
    /**
     * Will fetch posts from tbl_article for recent posts option
     *
     * @param string $table
     *
     * @return void
     */
    public function recentPosts($table)
    {
        $sql = "SELECT * FROM $table ";
        $sql.= "ORDER BY id DESC";
        return $this->dbHandler->selectData($sql);
    }
    /**
     * Will load a single post on singlePost.popover-header
     *
     * @param string $tableArticle
     * @param string $tableCategory
     * @param integer $postId
     *
     * @return mixed
     */
    public function getPostById($tableArticle, $tableCategory, $postId)
    {
        $sql = "SELECT $tableArticle.*,  $tableCategory.name FROM $tableArticle
        INNER JOIN $tableCategory
        ON
        $tableArticle.category = $tableCategory.id
        WHERE $tableArticle.id = $postId";
        $data = ['id' => $postId];
        return $this->dbHandler->select($sql, $data) ;
    }
    /**
     * Will store category data
     *
     * @param string $table
     * @param array $fields
     *
     * @return mixed
     */
    public function storePost($table, $fields)
    {
        return $this->dbHandler->insert($table, $fields);
    }
    /**
     * Will load a posts as per category on home/postsByCategory.php
     *
     * @param string $tableArticle
     * @param string $tableCategory
     * @param integer $postId
     *
     * @return mixed
     */
    public function getPostByCategory($tableArticle, $tableCategory, $categoryId)
    {
        $sql = "SELECT $tableArticle.*,  $tableCategory.name FROM $tableArticle
        INNER JOIN $tableCategory
        ON
        $tableArticle.category = $tableCategory.id
        WHERE $tableCategory.id = $categoryId";
        $data = ['id' => $categoryId];
        return $this->dbHandler->select($sql, $data) ;
    }
    /**
     * Will fetch searched data
     *
     * @param string $tableArticle
     * @param string $keyWord
     * @param integer $categoryKey
     *
     * @return mixed
     */
    public function searchPostsByCategory($tableArticle, $keyWord, $categoryKey)
    {
        // Will redirect to article home page if empty $ketWord / $categoryKey
        if (empty($keyWord) && $categoryKey == 0) {
            header("Location:".BASE_URL."?url=PostController/posts");
        }
        // Will fetch data as per $keyword / $categoryKey
        if (isset($keyWord) && !empty($keyWord)) {
            $sql = "SELECT * FROM $tableArticle WHERE title LIKE '%$keyWord%' OR content LIKE '%$keyWord%'";
        } elseif (isset($categoryKey)) {
            $sql = "SELECT * FROM $tableArticle WHERE category = $categoryKey";
        }
        return $this->dbHandler->select($sql) ;
    }
}