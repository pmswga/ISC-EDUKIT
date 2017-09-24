<?php
/* Smarty version 3.1.29, created on 2017-09-24 17:08:59
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\tests\complete.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59c7bc7bedece4_77657751',
  'file_dependency' => 
  array (
    'b8f065f147ad9628dd8d30b173e2a627bf2279f3' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\tests\\complete.tpl',
      1 => 1504343485,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c7bc7bedece4_77657751 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Прохождение теста</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/boostrap/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<?php echo '<script'; ?>
 type="text/javascript" src="../js/jquery.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="../js/bootstrap.js"><?php echo '</script'; ?>
>
	</head>
	<body>
		<div class="container-fluid">
      <br>
			<div class="row">
				<div class="col-md-4">
          <table class="table table-striped">
            <thead>
              <th colspan="3"><h1 align="center"><?php echo $_smarty_tpl->tpl_vars['test']->value->getCaption();?>
</h1></th>
            </thead>
            <tbody>
              <tr>
                <th>Предмет</th>
                <th>Автор</th>
                <th>Кол-во вопросов</th>
              </tr>
              <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['test']->value->getSubject()->getDescription();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['test']->value->getAuthor();?>
</td>
                <td><p><?php echo count($_smarty_tpl->tpl_vars['test']->value->getQuestions());?>
</p></td>
              </tr>
            </tbody>
          </table>
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<form name="completeTestForm" method="POST">
								<div class="form-group">
                  <a href="../user.php" class="btn btn-warning">Назад</a>
									<input type="submit" name="completeTestButton" value="Сдать" class="btn btn-success pull-right">
								</div>
                <?php $_smarty_tpl->tpl_vars['question_n'] = new Smarty_Variable(1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'question_n', 0);?>
                <?php $_smarty_tpl->tpl_vars['questions'] = new Smarty_Variable($_smarty_tpl->tpl_vars['test']->value->getQuestions(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'questions', 0);?>
                <?php if (shuffle($_smarty_tpl->tpl_vars['questions']->value) == true) {?>                
                  <?php
$_from = $_smarty_tpl->tpl_vars['questions']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_question_0_saved_item = isset($_smarty_tpl->tpl_vars['question']) ? $_smarty_tpl->tpl_vars['question'] : false;
$_smarty_tpl->tpl_vars['question'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['question']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
$__foreach_question_0_saved_local_item = $_smarty_tpl->tpl_vars['question'];
?>
                    <div class="form-group">
                      <label><?php echo $_smarty_tpl->tpl_vars['question']->value->getQuestion();?>
</label>
                      <input type="hidden" name="questions[]" value="<?php echo $_smarty_tpl->tpl_vars['question']->value->getQuestion();?>
">
                      <table class="table table-hover">
                        <tbody>
                          <?php $_smarty_tpl->tpl_vars['answers'] = new Smarty_Variable($_smarty_tpl->tpl_vars['question']->value->getAnswers(), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'answers', 0);?>
                          <?php if (shuffle($_smarty_tpl->tpl_vars['answers']->value) == true) {?>                          
                            <?php
$_from = $_smarty_tpl->tpl_vars['answers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_answer_1_saved_item = isset($_smarty_tpl->tpl_vars['answer']) ? $_smarty_tpl->tpl_vars['answer'] : false;
$_smarty_tpl->tpl_vars['answer'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['answer']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['answer']->value) {
$_smarty_tpl->tpl_vars['answer']->_loop = true;
$__foreach_answer_1_saved_local_item = $_smarty_tpl->tpl_vars['answer'];
?>
                              <tr>
                                <td><input type="radio" name="answer_<?php echo $_smarty_tpl->tpl_vars['question_n']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['answer']->value['answer'];?>
" class="form-control"></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['answer']->value['answer'];?>
</td>
                              </tr>
                            <?php
$_smarty_tpl->tpl_vars['answer'] = $__foreach_answer_1_saved_local_item;
}
if ($__foreach_answer_1_saved_item) {
$_smarty_tpl->tpl_vars['answer'] = $__foreach_answer_1_saved_item;
}
?>
                          <?php } else { ?>
                            <h2 align="center">Произошла ошибка при перемещивании вариантов ответов</h2>
                          <?php }?>
                        </tbody>
                      </table>
                    </div>
                  <?php $_smarty_tpl->tpl_vars['question_n'] = new Smarty_Variable($_smarty_tpl->tpl_vars['question_n']->value+1, null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'question_n', 0);?>
                  <?php
$_smarty_tpl->tpl_vars['question'] = $__foreach_question_0_saved_local_item;
}
if ($__foreach_question_0_saved_item) {
$_smarty_tpl->tpl_vars['question'] = $__foreach_question_0_saved_item;
}
?>
                <?php } else { ?>
                  <h2 align="center">Произошла ошибка при перемещивании вопросов, повторите попытку позже</h2>
                <?php }?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html><?php }
}
