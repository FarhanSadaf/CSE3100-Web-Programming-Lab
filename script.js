// After page loads
window.onload = () => {
    // Make .group class invisible
    document.querySelectorAll('.group').forEach(group => {
        group.style.display = 'none';
    });
    
    // Make .group-countdown invisible
    document.querySelectorAll('.countdown-container').forEach(group => {
        group.style.display = 'none';
    });
};

function startCountdown(seconds=5) {
    // If .group class is visible, make them invisible
    document.querySelectorAll('.group').forEach(group => {
        group.style.display = 'none';
    });

    // Make .group-countdown visible
    document.querySelectorAll('.countdown-container').forEach(group => {
        group.style.display = 'block';
    });

    const countdownElement = document.getElementById("countdown");
    countdownElement.textContent = seconds;

    const interval = setInterval(() => {
        seconds--;
        countdownElement.textContent = seconds;
        if (seconds <= 0) {
            clearInterval(interval);
            countdownElement.textContent = "";
        }
    }, 1000);

    // Make .countdown-container invisible after waiting
    setTimeout(() => {
        document.querySelectorAll('.countdown-container').forEach(group => {
            group.style.display = 'none';
        });
        splitRollNumbers()
    }, seconds * 1000);
}

function splitRollNumbers() {
    const fromRoll = parseInt(document.getElementById('fromRoll').value);
    const toRoll = parseInt(document.getElementById('toRoll').value);
    const groupSize = parseInt(document.getElementById('groupSize').value);

    if (isNaN(fromRoll) || isNaN(toRoll) || isNaN(groupSize) || fromRoll >= toRoll || groupSize >= (toRoll - fromRoll + 1)) {
        alert('Invalid input. Please make sure From Roll No. is less than To Roll No. and Each Group Size is less than the total range.');
        return;
    }

    const rollNumbers = Array.from({ length: toRoll - fromRoll + 1 }, (_, i) => i + fromRoll);
    const shuffledNumbers = rollNumbers.sort(() => Math.random() - 0.5);

    const aspGroup = shuffledNumbers.slice(0, groupSize).sort((a, b) => a - b);
    const phpGroup = shuffledNumbers.slice(groupSize).sort((a, b) => a - b);
    
    // Make group visible 
    document.querySelectorAll('.group').forEach(group => {
        group.style.display = 'block';
    });
    
    displayGroup("aspList", aspGroup);
    displayGroup("phpList", phpGroup);
}

function displayGroup(elementId, group) {
    const listElement = document.getElementById(elementId);
    listElement.innerHTML = ""; // Clear previous content

    group.forEach(number => {
        const listItem = document.createElement("li");
        listItem.textContent = number;
        listElement.appendChild(listItem);
    });
}
