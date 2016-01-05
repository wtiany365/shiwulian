<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Goods;
use yii\web\NotFoundHttpException;
use frontend\models\GoodsComment;
use frontend\models\GoodsTrace;
use frontend\models\Dynamic;

/**
 * 产品
 * Site controller
 */
class GoodsController extends Controller
{
	static public $PAGE_SIZE = 10;
	/**
	 * 产品广场
	 * @return Ambigous <string, string>
	 */
	public function actionIndex()
	{
		//排序属性
		$param = \Yii::$app->request->get("param", "id");
		//排序方式
		$order = \Yii::$app->request->get("order", "desc");
		$condition = ['status' => 1];
		list($goods, $pages) = Goods::getAllByCondition($condition, $param .' ' . $order, self::$PAGE_SIZE);

		return $this->render('index', ['goods' => $goods]);
	}
	
	/**
	 * 产品详细
	 * @throws NotFoundHttpException
	 * @return Ambigous <string, string>
	 */
	public function actionView()
	{
		//产品id
		$goods_id = \Yii::$app->request->get("id");
		$model = Goods::findById($goods_id);
		if(empty($model))
			throw new NotFoundHttpException('内容不存在！');
		
		return $this->render("view", ['model' => $model]);
	}
	
	/**
	 * 产品动态列表
	 * @return Ambigous <string, string>
	 */
	public function actionDynamic()
	{
		//产品id
		$goods_id = \Yii::$app->request->get("gid");
		$condition['goods_id'] = $goods_id;
		list($dynamic, $pages) = Dynamic::getAllByCondition($condition, "addtime desc");
		
		return $this->renderAjax("dynamic", ['dynamic' => $dynamic, 'pages' => $pages]);
	}
	
	/**
	 * 产品评论列表
	 * @return Ambigous <string, string>
	 */
	public function actionComment()
	{
		//产品id
		$goods_id = \Yii::$app->request->get("gid");
		$condition['goods_id'] = $goods_id;
		list($comment, $pages) = GoodsComment::getAllByCondition($condition, "addtime desc");
		
		return $this->renderAjax("comment", ['comment' => $comment, 'pages' => $pages]);
	}
	
	/**
	 * 产品追溯列表
	 * @return Ambigous <string, string>
	 */
	public function actionTrace()
	{
		//产品id
		$goods_id = \Yii::$app->request->get("gid");
		$condition['goods_id'] = $goods_id;
		list($trace, $pages) = GoodsTrace::getAllByCondition($condition, "addtime desc");
		
		return $this->renderAjax("trace", ['trace' => $trace, 'pages' => $pages]);
	}
}