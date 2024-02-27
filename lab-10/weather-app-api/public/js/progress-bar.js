function startLoading() {
    endLoading(); // Reset the progress bar first (in case it's still running)

    // Loader for the progress bar
    var progressBar = document.getElementById('progressBar');
    var width = 1;
    progressBar.style.transition = 'width 0.1s ease-in-out'; // Add transition effect for smoother animation
    var interval = setInterval(function () {
        if (width >= 100) {
            clearInterval(interval);
        } else {
            width++;
            progressBar.style.width = width + '%';
        }
    }, 10);
}

function endLoading() {
    // Reset the progress bar with a slight delay
    var progressBar = document.getElementById('progressBar');
    progressBar.style.transition = 'width 0.1s ease-in-out'; // Add transition effect for smoother animation
    progressBar.style.width = '100%'; // Set the progress bar to 100% first

    // Reset to 0% after a short delay
    setTimeout(function() {
        progressBar.style.width = '0%';
    }, 100); // Adjust the delay time as needed to match the transition duration
}