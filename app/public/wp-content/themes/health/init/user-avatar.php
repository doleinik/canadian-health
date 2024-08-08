<?php // Add custom meta box for user avatar URL
// Add custom meta box for user avatar URL
function custom_user_avatar_meta_box()
{
    add_meta_box(
        'custom-user-avatar',
        __('Custom Avatar URL', 'textdomain'),
        'custom_user_avatar_meta_box_callback',
        'user',
        'normal',
        'high'
    );
}
add_action('admin_init', 'custom_user_avatar_meta_box');

// Callback function to display the meta box content
function custom_user_avatar_meta_box_callback($user)
{
    $avatar_url = get_user_meta($user->ID, 'custom_avatar_url', true);
?>
    <table class="form-table">
        <tr>
            <th><label for="custom-avatar-url"><?php _e('Avatar URL', 'textdomain'); ?></label></th>
            <td>
                <input type="text" name="custom_avatar_url" id="custom-avatar-url" value="<?php echo esc_attr($avatar_url); ?>" class="regular-text" /><br />
                <span class="description"><?php _e('Enter the URL of the custom avatar image.', 'textdomain'); ?></span>
            </td>
        </tr>
    </table>
<?php
}

// Save custom avatar URL when user profile is updated
function save_custom_user_avatar($user_id)
{
    if (!current_user_can('edit_user', $user_id)) {
        return;
    }

    if (isset($_POST['custom_avatar_url'])) {
        update_user_meta($user_id, 'custom_avatar_url', esc_url_raw($_POST['custom_avatar_url']));
    }
}
add_action('personal_options_update', 'save_custom_user_avatar');
add_action('edit_user_profile_update', 'save_custom_user_avatar');
