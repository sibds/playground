<?php

namespace app\controllers\actions;
use sibds\components\ActiveRecord;
use yii\base\Exception;


/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 14.02.16
 * Time: 14:43
 */
class BaseAction extends \yii\base\Action
{
    /**
     * @var string
     */
    private $_modelName = null;

    /**
     * @var string
     */
    private $_searchModelName = null;

    /**
     * @var string
     */
    private $_view;

    /**
     * Упрощенная переадресация по действиям контроллера
     * По-умолчанию переходим на основное действие контроллера
     */
    public function redirect($actionId = null)
    {
        if ($actionId === null)
            $actionId = $this->controller->defaultAction;

        if (is_array($actionId)) {
            $this->controller->redirect($actionId);
        } else {
            $this->controller->redirect(array($actionId));
        }
    }

    /**
     * Рендер представление.
     * По-умолчанию рендерим одноименное представление
     */
    public function render($data)
    {
        if ($this->_view === null)
            $this->_view = $this->id;

        return $this->controller->render($this->_view, $data);
    }

    /**
     * Возвращаем новую модель или пытаемся найти ранее
     * созданную запись, если известен id
     *
     * @return ActiveRecord
     * @throws Exception
     */
    public function getModel()
    {
        $nameModel = $this->getModelName();

        if (($id = \Yii::$app->request->get('id')) === null)
            $model = new $nameModel;
        else if (($model = $nameModel::findOne($id)) === null)
            throw new NotFoundHttpException('The specified record cannot be found.');

        return $model;
    }

    /**
     * Возвращает имя модели, с которой работает контроллер
     * По-умолчанию имя модели совпадает с именем контроллера
     */
    public function getModelName()
    {
        if ($this->_modelName === null) {
            if (!is_null($this->controller->model))
                $this->_modelName = $this->controller->model;
            else {
                $class = new \ReflectionClass($this->controller->className());
                $namespace = $class->getNamespaceName();
                $this->_modelName = str_replace('\\controllers', '\\models', $namespace) . '\\' .
                    ucfirst($this->controller->id);
            }
        }

        return $this->_modelName;
    }

    public function getSearchModelName()
    {
        if ($this->_searchModelName === null) {
            if (!is_null($this->controller->searchModel))
                $this->_searchModelName = $this->controller->searchModel;
            else {
                $class = new \ReflectionClass($this->controller->className());
                $namespace = $class->getNamespaceName();
                $this->_searchModelName = str_replace('\\controllers', '\\models', $namespace) . '\\' .
                    ucfirst($this->controller->id) . 'Search';
            }
        }

        return $this->_searchModelName;
    }

    public function setView($value)
    {
        $this->_view = $value;
    }

    public function setModelName($value)
    {
        $this->_modelName = $value;
    }

    public function setSearchModelName($value)
    {
        $this->_searchModelName = $value;
    }
}