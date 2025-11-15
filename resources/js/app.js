import './bootstrap';

// Search Functionality
function initializeSearch() {
    const searchInput = document.getElementById("search-input");
    const searchButton = document.getElementById("search-button");

    // Check if elements exist
    if (!searchInput || !searchButton) {
        return; // Silent return - element tidak ada di halaman ini
    }

    // Function to focus the search input
    function focusSearchInput() {
        searchInput.focus();
        searchInput.select();
    }

    // Click event for the search button
    searchButton.addEventListener("click", function(event) {
        event.preventDefault();
        event.stopPropagation();
        focusSearchInput();
    });

    // Keyboard event listener
    function handleKeyDown(event) {
        // Don't trigger if user is typing in inputs/textarea
        if (isUserTypingInInput(document.activeElement)) {
            return;
        }

        // Cmd+K (Mac) or Ctrl+K (Windows/Linux)
        if ((event.metaKey || event.ctrlKey) && event.key === "k") {
            event.preventDefault();
            event.stopPropagation();
            focusSearchInput();
        }
        
        // "/" key to focus search
        else if (event.key === "/" && !event.ctrlKey && !event.metaKey) {
            event.preventDefault();
            event.stopPropagation();
            focusSearchInput();
        }
        
        // Escape key to blur search input
        else if (event.key === "Escape" && document.activeElement === searchInput) {
            searchInput.blur();
        }
    }

    // Helper function to check if user is typing in form elements
    function isUserTypingInInput(element) {
        if (!element) return false;
        const tagName = element.tagName.toLowerCase();
        const inputTypes = ['input', 'textarea', 'select'];
        
        if (element.isContentEditable) return true;
        
        if (inputTypes.includes(tagName)) {
            if (tagName === 'input') {
                const type = element.type.toLowerCase();
                // Allow shortcut for search inputs
                if (type === 'search' || type === 'text') {
                    return false;
                }
            }
            return true;
        }
        
        return false;
    }

    // Update the button text based on platform
    function updateShortcutButton() {
        const isMac = navigator.platform.toUpperCase().indexOf('MAC') >= 0;
        
        if (isMac) {
            searchButton.innerHTML = '<span>⌘</span><span>K</span>';
        } else {
            searchButton.innerHTML = '<span>Ctrl</span><span>K</span>';
        }
    }

    // Add keyboard event listener
    document.addEventListener("keydown", handleKeyDown);

    // Initialize
    updateShortcutButton();
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    initializeSearch();
});

// // Re-initialize jika menggunakan Turbolinks/Livewire
// document.addEventListener('turbolinks:load', initializeSearch);
// document.addEventListener('livewire:load', initializeSearch);