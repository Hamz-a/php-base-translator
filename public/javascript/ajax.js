(function() {
    // Ajax
    var xhr;

    // Select all buttons
    var buttons = document.getElementsByTagName('button');

    // Ajax Click handler
    var clickHandler = function(event) {
        var button = event.target || event.srcElement;

        var action = button.textContent;
        var value = button.previousElementSibling.value;
        var method = button.previousElementSibling.id;
        var url = '/' + action + '/' + method;

        xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if(xhr.readyState === xhr.DONE) {
                if(xhr.status === 200) {
                    updateFields(JSON.parse(xhr.responseText));
                }
            }
        };

        xhr.send('data=' + encodeURIComponent(value));
    };

    // Add click event listener to all buttons
    for(var i = 0; i < buttons.length; ++i) {
        buttons[i].addEventListener('click', clickHandler);
    }

    // Update fields
    var updateFields = function(data) {
        var textareas = document.getElementsByTagName('textarea');

        // Loop through each textarea and update the field
        for(var i = 0; i < textareas.length; ++i) {
            textareas[i].value = data[textareas[i].id];
        }
    };
})();