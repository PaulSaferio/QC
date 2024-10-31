window.onload = usen();

// Search Table Functionality
function searchTable() {
    // Get the search input element
    let input = document.getElementById('searchInput');
    
    // Get the search input value and convert it to uppercase for case-insensitive search
    let filter = input.value.toUpperCase();
    
    // Get the table and all its rows
    let table = document.getElementById('tabl');
    let tr = table.getElementsByTagName('tr');
    
    // Loop through the rows, skipping the first (header row)
    for (let i = 1; i < tr.length; i++) {
        // Set a variable to control if the row should be shown or hidden
        let shouldShowRow = false;
        
        // Get all the cells (td elements) in the current row
        let td = tr[i].getElementsByTagName('td');
        
        // Loop through all the cells in the row
        for (let j = 0; j < td.length; j++) {
            // Get the text content of the current cell
            if (td[j]) {
                let txtValue = td[j].textContent || td[j].innerText;
                
                // If the text in the cell contains the filter value, set shouldShowRow to true
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    shouldShowRow = true;
                    break;
                }
            }
        }
        
        // If shouldShowRow is true, display the row, otherwise hide it
        if (shouldShowRow) {
            tr[i].style.display = '';
        } else {
            tr[i].style.display = 'none';
        }
    }
}

function hide_side_menu() {
    let sidemenu = document.querySelector('#side-menu-toggler');
    
    sidemenu.checked = false;
}

function hide_contents() {
	var w = document.getElementById('changing');
	var x = document.getElementById('application');
	var u = document.getElementById('use');

    w.style.display = 'none';
	u.style.display = 'none';
	x.style.display = 'none';
}

function applic() {
    hide_side_menu();
    hide_contents();
    var w = document.getElementById('changing');
	var x = document.getElementById('application');
	var u = document.getElementById('use');

	x.style.display = x.style.display.trim().length < 1 ? 'none' : x.style.display
	

	if (x.style.display === "none") {
            
		if (u.style.display === "block") {
		    w.style.display = 'none';
            x.style.display = "block";
			u.style.display = 'none';
		
		}else if (w.style.display === "block") {
    		    w.style.display = 'none';
    		    x.style.display = "block";
    			u.style.display = "none";
			

		} else {
			x.style.display = "block";

		}

	} else {
		w.style.display = 'none';
		u.style.display = "none";
	}
}

function usen() {
    hide_side_menu();
    hide_contents();
    var u = document.getElementById('use');
    var w = document.getElementById('changing');
	var x = document.getElementById('application');
	
	u.style.display = u.style.display.trim().length < 1 ? 'none' : u.style.display

	if (u.style.display === "none") {
            
		if (x.style.display === "block") {
			x.style.display = 'none';
			w.style.display = 'none';
			u.style.display = "block";
		}else if (w.style.display === "block") {
    		    w.style.display = 'none';
    			x.style.display = "none";
			    u.style.display = "block";

		} else {
			u.style.display = "block";

		}

	} else {
		w.style.display = 'none';
		x.style.display = 'none';
	}
}

function showAddUserForm() {
    location.href = 'application/'
}

function showChangePasswordForm() {
    hide_side_menu();
    hide_contents();
	var w = document.getElementById('changing');
	var x = document.getElementById('application');
	var u = document.getElementById('use');
	
	w.style.display = w.style.display.trim().length < 1 ? 'none' : w.style.display
	if (w.style.display === "none") {

		if (x.style.display === "block") {
		    x.style.display = 'none';
			y.style.display = 'none';
			w.style.display = "block";
			u.style.display = "none";
			
		}else if (u.style.display === "block") {
		    y.style.display = "none";
		    x.style.display = 'none';
			w.style.display = "block";
			u.style.display = 'none';
		
		}else {
			w.style.display = "block";

		}

	} else {
		x.style.display = 'none';
		u.style.display = "none";
	}
}

function closeForm() {
	const formContainer = document.getElementById('form-container');
	formContainer.innerHTML = '';
}

function changeRows() {
    const rowSelector = document.getElementById("rowSelector");
    const rowsPerPage = parseInt(rowSelector.value);
    const table = document.getElementById("tabl");
    const rows = table.querySelectorAll("tbody tr");

    // Hide all rows initially
    rows.forEach((row, index) => {
        row.style.display = (index < rowsPerPage) ? '' : 'none';
    });
}  
// Initialize with 10 rows
window.onload = function() {
    changeRows();
};


/*const t = document.querySelector("tabl");
      
function searchTable(){
  const v = document.getElementById('searchInput').value.toLowerCase();
  if(v.length <3) return;  // optional parameter
  const rows = t.rows;  
  for (let z=1 ; z<rows.length ; z++)
    {
	  if(rows[z].cells[0].innerText.toLowerCase().includes(v) ) rows[z].style.display="table-row";
      else rows[z].style.display="none";
    }
}
document.getElementById('searchInput').addEventListener("input", filter);*/




