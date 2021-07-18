document.addEventListener('DOMContentLoaded', function () {
    per_page()
    $('#avatar').keyup(function () {
        $('#preview_avatar_user').attr('src', `${$('#avatar').val()}`)
    })
    $('#cover_photo').keyup(function () {
        $('#preview_cover_photo').attr('src', `${$('#cover_photo').val()}`)
    })
    $('.check_role').change(function (){
        $('.search_form').val("")
        $('.btn-search').click()
    })

    $('#cate_thumbnail').keyup(function () {
        $('#preview_cate_thumbnail').attr('src', `${$('#cate_thumbnail').val()}`)
    })
})

function per_page() {
    let items = document.querySelectorAll('.left_menu>li')
    let per_page = document.getElementById('per_page_code');

    for (let i = 0; i < items.length; i++) {
        if (items[i].slot === per_page.value) {
            items[i].classList.add('page_active')
        }
    }
}
