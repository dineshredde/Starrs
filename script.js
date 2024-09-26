document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('course-registration-form').onsubmit = function() {
        const coursesChecked = document.querySelectorAll('input[name="courses[]"]:checked').length;
        const activeCptChecked = document.querySelector('input[name="active_cpt"]:checked').value;
        
        const minimumCoursesRequired = activeCptChecked === 'yes' ? 2 : 3;
        
        if (coursesChecked < minimumCoursesRequired) {
            alert('You must select at least ' + minimumCoursesRequired + ' courses.');
            return false; // Prevent form from submitting
        }
        
        return true; // Allow form submission
    };
});

function updateCourseRequirement(hasCpt) {
    // This function can be expanded to update the UI or form behavior based on CPT status
}
