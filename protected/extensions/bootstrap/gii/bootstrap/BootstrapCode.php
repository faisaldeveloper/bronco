<?php
/**
 *## BootstrapCode class file.
 *
 * @author Christoffer Niska <ChristofferNiska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2011-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

Yii::import('gii.generators.crud.CrudCode');

/**
 *## Class BootstrapCode
 *
 * @package booster.gii
 */
class BootstrapCode extends CrudCode
{
	public function generateActiveRow($modelClass, $column, $type='form')
	{
		
		/* $text_field_width = "'width:120px'";
		$dropdown_width = "'width:128px'";
		
		
		if($column->isForeignKey){
			$model = CActiveRecord::model($this->modelClass);//convert text to model
			$relations = $model->relations();
			foreach($relations as $k=>$relation){
			  if($relation[0]=="CBelongsToRelation" && $relation[2]==$column->name){
				 
				 //if name column exists in related model
				 $relation_field_found=0;
				 $related_model = CActiveRecord::model($relation[1]);//convert text to model
				 $related_labels = $related_model->attributeLabels();//get names
				 
				 //$lbl_index = 1;
				 $relation_field_found = 0;
				
				 foreach($related_labels as $key=>$label){
					 if($related_model->tableSchema->columns[$key]->type=="string"){
						 $relational_field = $key; 
						 $relation_field_found = 1;
						 break;
					}
					 //$lbl_index++;
				 //if($key=="name"){$relation_field_found = 1;}
				 }
				 
				 if( $relation_field_found>0){
					 
					 
				$parent_found = 0;
				$child_model = "";
				$child_field = "";
				$ajax_code="";
				$fk = $column->name;
				$parent_model="";
				foreach($relations as $rels){
					if($rels[0]=="CBelongsToRelation" && $rels[2]!=$column->name){
					//print_r($rels);
					//cho "<br>++++++++++++".$rels[1]."++++++++++++++++<br>";	
					$relation_level2 = CActiveRecord::model($rels[1]);
						foreach($relation_level2->relations() as $rels_level2){
							if($parent_found == 0 && $relation[0]=="CBelongsToRelation" && $relation[1]==$rels_level2[1] && $relation[2]==$rels_level2[2]){
								$parent_found = 1;
								$child_model = $rels[1];
								$child_field = $modelClass."_".$rels[2];
								$parent_model = $rels_level2[1];
							//echo "<br>++++++++++++level 2 ++++++++++++++++<br>";
							//print_r($rels_level2);
							}//end if
						}//end foreach
					
					}//end if
					
				}//end foreach
				
				if($parent_found>0){
				//====================== Code for autometic parent <-> child lists
				//echo "\n====$child_model=$child_field======$relational_field=================".$column->name;
				$ajax_code = "'ajax' => array(
				'type'=>'POST', //request type
				'data'=>array(\"model\"=>\"$child_model\",\"fk\"=>\"$fk\",\"value\"=>\"js:this.value\",\"field_name\"=>\"name\"),
				'url'=>CController::createUrl('cities/dynamicLoad'), //url to call.
				'update'=>\"#$child_field\", //selector to update
				'beforeSend' => 'function(){ $(\"#city_loader\").addClass(\"loading\"); }',
				'complete' => 'function(){ $(\"#$child_field\").trigger(\"liszt:updated\");$(\"#city_loader\").removeClass(\"loading\"); }',
				),";
				$ajax_search = "'ajax' => array(
				'type'=>'POST', //request type
				'data'=>array(\"model\"=>\"$child_model\",\"fk\"=>\"$fk\",\"value\"=>\"js:this.value\",\"field_name\"=>\"name\",\"parent_model\"=>\"$parent_model\"),
				'url'=>CController::createUrl('cities/dynamicSearch'), //url to call.
				'update'=>\"#$child_field\", //selector to update
				'beforeSend' => 'function(){ $(\"#city_loader\").addClass(\"loading\"); }',
				'complete' => 'function(){ $(\"#$child_field\").trigger(\"liszt:updated\");$(\"#city_loader\").removeClass(\"loading\"); }',
				),";
				}
				//=============================== end parent <=> child lists 
					 
					 
					 if($type=="search"){
				//return "echo \$form->textField(\$model,'{$column->name}',array('style'=>$text_field_width))";
				return "\$form->dropDownList(\$model,'{$column->name}',CHtml::listData(".$relation[1]."::model()->findAll(), '".$relational_field."', '".$relational_field."'),array('empty'=>'Select Option',$ajax_search'class'=>'chzn-select','style'=>$dropdown_width))";
					 }else{
				//$related_model = CActiveRecord::model($relation[1]);
				//$related_model->relations();
				//foreach($related_model->relations() as $key=>$values){
				//print_r($values);	
				//}
				
                return "\$form->dropDownList(\$model,'{$column->name}',CHtml::listData(".$relation[1]."::model()->findAll(), 'id', '".$relational_field."'),array('empty'=>'Select Option',$ajax_code				
				'class'=>'chzn-select','style'=>$dropdown_width))";
					 }
				break;  
				 }else{return "\$form->textField(\$model,'{$column->name}',array('style'=>$text_field_width))";	}
				}
			 }//foreach
			
		
		}else if($column->type==='boolean' || ($column->type==='integer' && $column->size=='1')){
			//return "echo \$form->checkBox(\$model,'{$column->name}')";
			  return "\$form->checkBoxRow(\$model,'{$column->name}')";
		}// else if($column->type==='integer'){
			//return "\$form->textFieldRow(\$model,'{$column->name}',array('style'=>$text_field_width))";
		} //
		///Faisal code stats here
		 else if (strtoupper($column->dbType) == 'DATE') {
			return "\$form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => \$model,
			'attribute' => '{$column->name}',
			'value' => \$model->{$column->name},
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));\n";
		
		
		} else if (strtoupper($column->dbType) == 'DATETIME' || strtoupper($column->dbType) == 'TIMESTAMP') {
			return "\$this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
			'model'=> \$model,
			'attribute'=>'{$column->name}',
			'value' => \$model->{$column->name},
			'options'=>array(
				'hourGrid' => 6,
				'dateFormat'=>'yy-mm-dd',
				'hourMin' => 0,
				'hourMax' => 23,
				'timeFormat' => 'h:m',
				'changeMonth' => true,
				'changeYear' => false,			
				),
			));\n";		
		}
		/// Fcode ends here
		
		else if(stripos($column->dbType,'text')!==false){
			//return "echo \$form->textArea(\$model,'{$column->name}',array('rows'=>3, 'style'=>$dropdown_width))";
			return "\$form->textAreaRow(\$model,'{$column->name}',array('rows'=>6, 'cols'=>50, 'class'=>'span8'))";
		}else{
			if(preg_match('/^(password|pass|passwd|passcode)$/i',$column->name))
				$inputField = 'passwordFieldRow'; //$inputField='passwordField';
			else
				$inputField = 'textFieldRow'; //$inputField='textField';

			if ($column->type !== 'string' || $column->size === null) {
				return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5'))";
			} else {
				return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5','maxlength'=>$column->size))";
			}
		} */
		 if ($column->type === 'boolean') {
			return "\$form->checkBoxRow(\$model,'{$column->name}')";
		} else if (stripos($column->dbType, 'text') !== false) {
			return "\$form->textAreaRow(\$model,'{$column->name}',array('rows'=>6, 'cols'=>50, 'class'=>'span8'))";
		} else {
			if (preg_match('/^(password|pass|passwd|passcode)$/i', $column->name)) {
				$inputField = 'passwordFieldRow';
			} else {
				$inputField = 'textFieldRow';
			}

			if ($column->type !== 'string' || $column->size === null) {
				return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5'))";
			} else {
				return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5','maxlength'=>$column->size))";
			}
		}
	}
}
