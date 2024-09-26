function loadAdvisees(facultyId) {
    fetch('php/load_advisees.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'faculty_id=' + facultyId
    })
    .then(response => response.json())
    .then(data => {
        const adviseeSection = document.getElementById('adviseeInfo');
        data.forEach(advisee => {
            adviseeSection.innerHTML += `<p>${advisee.name} - ${advisee.major}</p>`;
        });
    })
    .catch(error => console.error('Error:', error));
}