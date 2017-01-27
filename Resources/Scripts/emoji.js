$(document).ready(function() {
    $("#emojionearea1").emojioneArea({

        pickerPosition: "top",
        tonesStyle: "bullet",
        placeholder: "Mesajınız",
        events: {
            keyup: function (editor, event) {
                console.log(editor.html());
                console.log(this.getText());
                text = editor.html();
                dwtKeyUp(text,event);
            }
        }
    });
});