class Notification{
    success() {
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: 'Successfully Done!',
            timeout: 2000,
        }).show();
    };

    alert() {
        new Noty({
            type: 'alert',
            layout: 'topRight',
            text: 'Are you sure?',
            timeout: 2000,
        }).show();
    };

    error() {
        new Noty({
            type: 'alert',
            layout: 'topRight',
            text: 'Something went wrong...',
            timeout: 2000,
        }).show();
    };

    warning() {
        new Noty({
            type: 'warning',
            layout: 'topRight',
            text: 'Ooppss...',
            timeout: 2000,
        }).show();
    };

    image_validation() {
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: 'Upload Image less than 1MB',
            timeout: 2000,
        }).show();
    };


}

export default Notification = new Notification();