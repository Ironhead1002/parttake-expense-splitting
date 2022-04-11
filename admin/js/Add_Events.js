$(document).ready(function () {

            $(document).on('click', '#remove_member', function () {
                $(this).closest('#remove').remove();
            });

    $(document).on('click', '#add_member', function (e) {
        e.preventDefault();
        $('#add_field').append('\
            <div id="remove"><input class=" px-5 mt-2 py-1 text-gray-700 bg-gray-200 rounded"  name="Members[]" type="email" required="" placeholder="member email" >\
            <button class="px-2 py-1 mt-3 text-white font-light tracking-wider bg-gray-900 rounded"  id="remove_member">Remove</button></div>');
    });

        });
