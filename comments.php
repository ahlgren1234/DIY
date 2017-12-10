<?php /*
	The template for displaying comments and the comment form
	
	@package WordPress
	@subpackage DIY Theme
	@since DIY Theme 1.0

*/ ?>
<?php if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die(); ?>

<?php if (post_password_required()) : ?>
	<p class="post-password"><?php _e('This post is password protected. Enter the password to view comments.', 'diy-theme'); ?></p>
<?php return; endif; ?>

<div id="comments" class="comments-wrap">
	<?php if (have_comments()) : ?>
		<div class="comments-list">
			<h4>
				<?php comments_number(
					__('<span>No</span> responses', 'diy-theme'), 
					__('<span>One</span> response', 'diy-theme'), 
					__('<span>%</span> responses', 'diy-theme')
				); ?> 
				<?php _e('to &ldquo;', 'diy-theme') . the_title() . _e('&rdquo;', 'diy-theme'); ?>
			</h4>
			<ol><?php wp_list_comments('type=comment'); ?></ol>
			
			<?php if ((int) get_option('page_comments') === 1) : ?>
			<div class="nav nav-comments">
				<div class="prev"><?php previous_comments_link(); ?></div>
				<div class="next"><?php next_comments_link(); ?></div>
			</div>
			<?php endif; ?>
		</div>
	<?php else : // no comments yet.. ?>
		<?php if (comments_open()) : // no comments, but comments open ?>
		<div class="comments-list"><p><?php __('Be the first to respond..', 'diy-theme'); ?></p></div>
		
		<?php else : // no comments, and comments closed ?>
		<div class="comments-list"><p><?php __('Comments are closed.', 'diy-theme'); ?></p></div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (comments_open()) : ?>
		<div id="respond" class="comments-respond">
			<?php comment_form(); ?>
		</div>
	<?php endif; ?>
</div>