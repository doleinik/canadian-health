<?php
/* @var $this NewsletterEmailsAdmin */
/* @var $controls NewsletterControls */
/* @var $logger NewsletterLogger */

defined('ABSPATH') || exit;

require_once NEWSLETTER_INCLUDES_DIR . '/paginator.php';

if ($controls->is_action('template')) {
    $original = $this->get_email($_POST['btn']);
    $email = [];
    $email['subject'] = $original->subject;
    $email['message'] = $original->message;
    $email['message_text'] = $original->message_text;
    $email['send_on'] = 0;
    $email['type'] = 'composer_template';
    $email['editor'] = NewsletterEmails::EDITOR_COMPOSER;
    $email['track'] = '1';
    $email['options'] = $original->options;

    $this->save_email($email);
    $controls->messages .= __('Template created.', 'newsletter');
}

if ($controls->is_action('copy')) {
    $original = $this->get_email($_POST['btn']);
    $email = array();
    $email['subject'] = $original->subject;
    $email['message'] = $original->message;
    $email['message_text'] = $original->message_text;
    $email['send_on'] = time();
    $email['type'] = 'message';
    $email['editor'] = $original->editor;
    $email['track'] = $original->track;
    $email['options'] = $original->options;

    $this->save_email($email);
    $controls->messages .= __('Message duplicated.', 'newsletter');
}

if ($controls->is_action('delete')) {
    $this->delete_email($_POST['btn']);
    $controls->add_message_deleted();
}

if ($controls->is_action('delete_selected')) {
    $r = $this->delete_email($_POST['ids']);
    $controls->messages .= $r . ' message(s) deleted';
}

$pagination_controller = new TNP_Pagination_Controller(NEWSLETTER_EMAILS_TABLE, 'id', ['type' => 'message']);
$emails = $pagination_controller->get_items();
?>

<div class="wrap tnp-emails tnp-emails-index" id="tnp-wrap">

    <?php include NEWSLETTER_ADMIN_HEADER ?>

    <div id="tnp-heading">

        <h2><?php _e('Newsletters', 'newsletter') ?></h2>

        <?php include __DIR__ . '/nav.php' ?>

    </div>

    <div id="tnp-body">

        <?php $controls->show() ?>

        <form method="post" action="">
            <?php $controls->init(); ?>

            <a href="<?php echo $this->get_admin_page_url('composer'); ?>" class="button-primary"><?php _e('Add new', 'newsletter') ?></a>

            <?php $controls->btn('delete_selected', __('Delete selected', 'newsletter'), ['tertiary'=>true, 'confirm'=>true]); ?>

            <?php $pagination_controller->display_paginator(); ?>

            <table class="widefat tnp-newsletters-list" style="width: 100%">
                <thead>
                    <tr>
                        <th style="text-align: left"><input type="checkbox" style="margin-left: 0;" onchange="jQuery('input.tnp-selector').prop('checked', this.checked)"></th>
                        <th>Id</th>
                        <th><?php _e('Subject', 'newsletter') ?></th>
                        <th><?php _e('Status', 'newsletter') ?></th>
                        <th><?php _e('Progress', 'newsletter') ?>&nbsp;(*)</th>
                        <th><?php _e('Date', 'newsletter') ?></th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($emails as $email) { ?>
                        <tr>
                            <td style="text-align: left;">
                                <input type="checkbox" class="tnp-selector" name="ids[]" value="<?php echo $email->id; ?>">
                            </td>
                            <td style="font-size: .9em">
                                <?php echo $email->id; ?>
                            </td>
                            <td>
                                <?php
                                if ($email->subject)
                                    echo esc_html($email->subject);
                                else
                                    echo "Newsletter #" . $email->id;
                                ?>
                            </td>

                            <td>
                                <?php $this->show_email_status_label($email) ?>
                            </td>
                            <td>
                                <?php $this->show_email_progress_bar($email, array('numbers' => true)) ?>
                            </td>
                            <td>
                                <?php if ($email->status == 'sent' || $email->status == 'sending') echo $this->format_date($email->send_on); ?>
                            </td>
                            <td>
                                <?php echo $this->get_edit_button($email) ?>
                            </td>

                            <td style="white-space: nowrap">
                                <?php $controls->button_icon_statistics(NewsletterStatisticsAdmin::instance()->get_statistics_url($email->id), ['secondary'=>true]) ?>
                                <?php $controls->button_icon_view(home_url('/') . '?na=view&id=' . $email->id) ?>
                            </td>

                            <td style="white-space: nowrap">
                                <?php $controls->button_icon_copy($email->id); ?>
                                <?php $controls->button_icon_delete($email->id, ['secondary'=>true]); ?>
                                <?php $controls->btn('template', 'T', ['data'=>$email->id, 'tertiary'=>true, 'confirm'=>'Create a template from this newsletter?', 'title' => 'Create a template']); ?>
                                <?php if (NEWSLETTER_DEBUG) { ?>
                                <?php $controls->btn_link(home_url('/') . '?na=json&id=' . $email->id, '{}') ?>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <p>
                (*) <?php _e('Expected total at the end of the delivery may differ due to subscriptions/unsubscriptions occurred meanwhile.', 'newsletter') ?>
            </p>
        </form>
    </div>

    <?php include NEWSLETTER_DIR . '/tnp-footer.php'; ?>

</div>
