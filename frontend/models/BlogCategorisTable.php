<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_categoris_table".
 *
 * @property integer $id
 * @property string $alias
 * @property string $title
 * @property string $descriptions
 */
class BlogCategorisTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog_categoris_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'title', 'descriptions'], 'required'],
            [['descriptions'], 'string'],
            [['alias', 'title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'title' => 'Title',
            'descriptions' => 'Descriptions',
        ];
    }

    //получение всех категорий
    public static function getAllCategorisPosts($sort = SORT_ASC)
    {

        $obj = self::find()
                        ->orderBy([
                                'id'=>$sort,
                                 ])->all();

        return $obj;

    }

    //получаем все посты данной категории. Вызов $obj->PostsFromCategory
    public function getPostsFromCategory($limit = false, $orderBy = ['createdDate'=> SORT_DESC] )//от новых к старым
    {
         $res = $this->hasMany(BlogPostsTable::className(), ['id' => 'id_post'])
                ->viaTable('blog_categoris_posts_table', ['id_category' => 'id'])
                ->limit($limit)
                ->orderBy($orderBy)
                ->all();

         return $res;

    }

    //получаем данные одной категории.
    public static function getOneCategory($alias)
    {
        return self::find()->where([   'alias' => $alias,
                                        //'status' => '1'
                                        ])
                                        ->one();
    }

    public function getCategorisPosts()
    {
        return $this->hasMany(BlogCategorisPostsTable::className(), ['id_category' => 'id']);
    }

    //получаем данные одной категории.
    //жадная загрузка greedy
    //получить можнов foreach($res as $row) var_dump($row->categorisPosts['0']->blogPost->title);die;
    public static function greedyOneCategoryFromId($catId, $postsLimit)
    {
        return static::find()->where([ 'id' => $catId])
//                                                    ->orderBy('id')
                                                    ->with('categorisPosts.blogPost')//через public function getCategorisPosts() и public function getBlogPost()(class BlogCategorisPostsTable)
                                                    ->limit($postsLimit)
                                                    ->all();


    }
//lazy

    //получаем данные одной категории.
    //жадная загрузка greedy
    //получить можно var_dump($row->categorisPosts['0']->blogPost->title);die;
    //только у обьекта
//    public function lazyOneCategoryFromId($andWhere=false, $orderBy = ['createdDate'=> SORT_DESC])//от новых к старым
//    {
//        $res = $this->hasMany(BlogPostsTable::className(), ['id' => 'id_post'])
//                ->viaTable('blog_categoris_posts_table', ['id_category' => 'id']);
//
//        if($andWhere && is_array($andWhere))
//        {
//            $res->andWhere($andWhere);//['important' => 1]
//        }
//
//        $res->orderBy($orderBy);
//        $res->all();
//
//        return $res;
//    }



}
