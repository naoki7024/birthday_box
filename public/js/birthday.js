const formPost = document.getElementById('formPost');

formPost.addEventListener('submit',function(event) {
    if (window.confirm('BOXに入れてよろしいですか？')) {
        return true;
    }

    event.stopPropagation();
    event.preventDefault();

    window.alert('キャンセルしました');

    return false;
});

const clear = document.getElementById('button2');

clear.addEventListener('click',function(event) {
    if (window.confirm('本当に削除しますか？')) {
        return true;
    }

    event.stopPropagation();
    event.preventDefault();

    window.alert('キャンセルしました');

    return false;
});

  
