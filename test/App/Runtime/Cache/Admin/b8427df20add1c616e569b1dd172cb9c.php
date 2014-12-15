<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">
	<form method="post" action="__URL__/update/navTabId/listfields/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);"><?php  ?>
		<input type="hidden" name="fields_id" value="<?php echo ($vo["fields_id"]); ?>"/>
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>配置项：</dt>
				<dd>
					<?php if($vo["field"] == 'title'): ?>站点标题
						<?php elseif($vo["field"] == 'copyright'): ?>站点版权
						<?php elseif($vo["field"] == 'ad'): ?>
						首页广告
						<?php elseif($vo["field"] == 'announcement'): ?>
						站点公告
						<?php else: ?>
						站点描述<?php endif; ?>
				</dd>
			</dl>
			<br/><br/><br/><br/>
			<dl>
				<dt>配置值：</dt>
				<dd>
					<textarea  class="editor" name="content" tools="simple" id="content" cols="50" rows="15" class="required" ><?php echo ($vo["content"]); ?></textarea>
				</dd>
			</dl>
		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>