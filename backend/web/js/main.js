$.pjax.reload({container:'#articuloupdate'});


    document.querySelector('a').addEventListener('click', function() {
    const icon = this.querySelector('i');
    const text = this.querySelector('span');

    if (icon.classList.contains('fa-eye')) {
    icon.classList.remove('fa-eye');
    icon.classList.add('fa-eye-slash');
    text.innerHTML = 'Hide';
} else {
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye');
    text.innerHTML = 'Show';
}
});
