<div class="edit-form-wrap">
<?php

    /** @var \WonderWp\Component\Notification\AdminNotification $notification */
    if(is_object($notification)){
        echo $notification;
    }

    /** @var \WonderWp\Component\Form\FormViewInterface $formView */
    echo $formView->render();
?>
</div>
