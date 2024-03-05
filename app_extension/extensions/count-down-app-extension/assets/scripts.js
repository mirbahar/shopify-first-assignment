function startCountdown(durationInSeconds) {

    let timerElement = document.querySelector('.timer');
    let endTime = Date.now() + durationInSeconds * 1000;

    // Update timer every second
    let timerInterval = setInterval(updateTimer, 1000);

    function updateTimer() {
        let remainingTime = endTime - Date.now();

        if (remainingTime <= 0) {
            clearInterval(timerInterval);
            timerElement.textContent = 'Timer Expired';
        } else {
            let minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

            timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }
    }

    // Initial call to update timer immediately
    updateTimer();
}

// Function to customize countdown timer styles
function customizeTimer(styles) {
    let timerElement = document.querySelector('.timer');
    Object.assign(timerElement.style, styles);
}
// Call startCountdown method with the desired duration in seconds
startCountdown(3600);
