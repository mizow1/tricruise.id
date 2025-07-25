<?php 
$qa_q = explode("\n",get_field('qa_question'));
$qa_a = explode("\n",get_field('qa_answer'));
if($qa_q[0]&&$qa_a[0]):
?>
<section class="universal_qa">
<?php foreach($qa_q as $key=>$val):?>
	<?php if($qa_q[$key]&&$qa_a[$key]): ?>
	<dl>
		<dt>
			<span class="icon"></span>
			<p><?php echo $qa_q[$key]; ?></p>
		</dt>
		<dd>
			<span class="icon"></span>
			<p><?php echo $qa_a[$key]; ?></p>
		</dd>
	</dl>
	<?php endif; ?>
<?php endforeach; ?>
</section>
<?php endif; ?>
