<div class="edit-form-wrap">
    <?php

    $formViewInterfaceName = \WonderWp\Component\Form\FormViewInterface::class;

    /** @var \WonderWp\Component\Notification\AdminNotification $notification */
    if (is_object($notification)) {
        echo $notification;
    }

    /** @var \WonderWp\Component\Form\FormViewInterface $formView */
    /** @var array $formViewOpts */
    $formViewOpts = !empty($formViewOpts) ? $formViewOpts : [];

    if (is_subclass_of($formView, $formViewInterfaceName)) {
        echo $formView->render($formViewOpts);
    } else {
        throw new Exception('Given Form View object should implement ' . $formViewInterfaceName);
    }
    ?>
</div>
