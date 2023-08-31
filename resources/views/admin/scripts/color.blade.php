<script>
    // Get the color and text input elements
    var colorPickers = document.querySelectorAll(".colorPicker");
    var colorInputs = document.querySelectorAll(".color");
    // Add an event listener for when the value of the color input changes
    colorPickers.forEach(function(colorPicker, index) {
        colorPicker.addEventListener("change", function() {
            // Get the value of the color input
            var selectedColor = colorPicker.value;
            // Set the value of the text input to the selected color
            colorInputs[index].value = selectedColor;
        });
    });
</script>
