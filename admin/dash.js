window.onload = pend();
   
document.onclick = function(e){
    let sidemenu = document.querySelector('#side-menu-toggler');
            //if (sidemenu.checked = true ) {
                //sidemenu.checked = false;
                
            //}else{
             //   sidemenu.checked = true;
           // }
        }

function hide_side_menu() {
    let sidemenu = document.querySelector('#side-menu-toggler');
    sidemenu.checked = false;
}
function printt(){
					var tabe = document.getElementById('tabl');
					newWin=window.open("");
					newWin.document.write(tabe.outerHTML);
					newWin.print();
					newWin.close();
					}

function hide_contents() {
    var v = document.getElementById('pending');
	var w = document.getElementById('changing');
	var x = document.getElementById('application');
	var y = document.getElementById('adding');
	var u = document.getElementById('use');

    w.style.display = 'none';
	y.style.display = 'none';
	v.style.display = 'none';
	u.style.display = "none";
	x.style.display = 'none';
}

function applic() {
    hide_side_menu();
    hide_contents();
    var v = document.getElementById('pending');
	var w = document.getElementById('changing');
	var x = document.getElementById('application');
	var y = document.getElementById('adding');
	var u = document.getElementById('use');

	x.style.display = x.style.display.trim().length < 1 ? 'none' : x.style.display
	

	if (x.style.display === "none") {
            
		if (y.style.display === "block") {
		    y.style.display = "none";
		    w.style.display = 'none';
            v.style.display = 'none';
			x.style.display = "block";
			u.style.display = "none";
		
		}else if (u.style.display === "block") {
		    y.style.display = "none";
		    w.style.display = 'none';
            v.style.display = 'none';
			x.style.display = "block";
			u.style.display = 'none';
		
		}else if (v.style.display === "block") {
    			x.style.display = "none";
    			w.style.display = 'none';
                v.style.display = 'none';
    			y.style.display = 'block';
    			u.style.display = "none";
			
		}else if (w.style.display === "block") {
    		    w.style.display = 'none';
    		    y.style.display = 'none';
    			v.style.display = 'none';
    			x.style.display = "block";
    			u.style.display = "none";
			

		} else {
			x.style.display = "block";

		}

	} else {
		w.style.display = 'none';
		y.style.display = 'none';
		v.style.display = 'none';
		u.style.display = "none";
	}
}

function usen() {
    hide_side_menu();
    hide_contents();
    var u = document.getElementById('use');
    var v = document.getElementById('pending');
	var w = document.getElementById('changing');
	var x = document.getElementById('application');
	var y = document.getElementById('adding');

	u.style.display = u.style.display.trim().length < 1 ? 'none' : u.style.display

	if (u.style.display === "none") {
            
		if (y.style.display === "block") {
		    y.style.display = "none";
		    w.style.display = 'none';
            v.style.display = 'none';
			u.style.display = "block";
			x.style.display = 'none';
		
		}else if (v.style.display === "block") {
    			x.style.display = "none";
    			w.style.display = 'none';
                v.style.display = 'none';
    			y.style.display = 'none';
			    u.style.display = "block";
		}else	if (x.style.display === "block") {
			y.style.display = "none";
			x.style.display = 'none';
			w.style.display = 'none';
			v.style.display = 'none';
			u.style.display = "block";
		}else if (w.style.display === "block") {
    		    w.style.display = 'none';
    		    y.style.display = 'none';
    			v.style.display = 'none';
    			x.style.display = "none";
			    u.style.display = "block";

		} else {
			u.style.display = "block";

		}

	} else {
		w.style.display = 'none';
		y.style.display = 'none';
		v.style.display = 'none';
		x.style.display = 'none';
	}
}

function showAddUserForm() {
    hide_side_menu();
    hide_contents();
    var v = document.getElementById('pending');
	var w = document.getElementById('changing');
	var x = document.getElementById('application');
	var y = document.getElementById('adding');
	var u = document.getElementById('use');

	y.style.display = y.style.display.trim().length < 1 ? 'none' : y.style.display

	
	if (y.style.display === "none") {
        
        if (v.style.display === "block") {
			x.style.display = "none";
			y.style.display = 'block';
			w.style.display = 'none';
            v.style.display = 'none';
            u.style.display = "none";
		}else if (u.style.display === "block") {
		    u.style.display = "none";
		    w.style.display = 'none';
            v.style.display = 'none';
			y.style.display = "block";
			x.style.display = 'none';
		
		}else if (w.style.display === "block") {
			x.style.display = "none";
			y.style.display = 'block';
			w.style.display = 'none';
            v.style.display = 'none';
            u.style.display = "none";
		}else	if (x.style.display === "block") {
			y.style.display = "block";
			x.style.display = 'none';
			w.style.display = 'none';
			v.style.display = 'none';
			u.style.display = "none";
		} else {
			y.style.display = "block";

		}

	} else {
		w.style.display = 'none';
		x.style.display = 'none';
		v.style.display = 'none';
		u.style.display = "none";
	}
}

function showChangePasswordForm() {
    hide_side_menu();
    hide_contents();
    var v = document.getElementById('pending');
	var w = document.getElementById('changing');
	var x = document.getElementById('application');
	var y = document.getElementById('adding');
	var u = document.getElementById('use');
	
	w.style.display = w.style.display.trim().length < 1 ? 'none' : w.style.display
	if (w.style.display === "none") {

		if (x.style.display === "block") {
		    x.style.display = 'none';
			y.style.display = 'none';
			v.style.display = 'none';
			w.style.display = "block";
			u.style.display = "none";
			
		}else if (u.style.display === "block") {
		    y.style.display = "none";
		    x.style.display = 'none';
            v.style.display = 'none';
			w.style.display = "block";
			u.style.display = 'none';
		
		}else if (v.style.display === "block") {
			x.style.display = "none";
			y.style.display = 'none';
            v.style.display = 'none';
			w.style.display = 'block';
			u.style.display = "none";
			
		}else	if (y.style.display === "block") {
		    x.style.display = 'none';
			y.style.display = 'none';
			v.style.display = 'none';
			w.style.display = "block";
			u.style.display = "none";
			

		} else {
			w.style.display = "block";

		}

	} else {
		x.style.display = 'none';
		y.style.display = 'none';
		v.style.display = 'none';
		u.style.display = "none";
	}
}

function closeForm() {
	const formContainer = document.getElementById('form-container');
	formContainer.innerHTML = '';
}
function printin(){
    var voice = document.getElementById('ivoice');
    newWin=window.open("");
	newWin.document.write(tabe.outerHTML);
	newWin.print();
	newWin.close();
}

function pend() {
    hide_side_menu();
    hide_contents();
    var v = document.getElementById('pending');
	var w = document.getElementById('changing');
	var x = document.getElementById('application');
	var y = document.getElementById('adding');
	var u = document.getElementById('use');

	v.style.display = v.style.display.trim().length < 1 ? 'none' : v.style.display

	if (v.style.display === "none") {

		if (y.style.display === "block") {
			x.style.display = "none";
			y.style.display = 'none';
			w.style.display = 'none';
            v.style.display = 'block';
            u.style.display = "none";
		}else if (u.style.display === "block") {
		    y.style.display = "none";
		    x.style.display = 'none';
            w.style.display = 'none';
			v.style.display = "block";
			u.style.display = 'none';
		
		}else if (x.style.display === "block") {
    			x.style.display = "none";
    			y.style.display = 'none';
    			w.style.display = 'none';
                v.style.display = 'block';
                u.style.display = "none";
		}else if (w.style.display === "block") {
    			x.style.display = "none";
    			y.style.display = 'none';
    			w.style.display = 'none';
    			v.style.display = 'block';
    			u.style.display = "none";
		} else {
			v.style.display = "block";

		}

	} else {
		w.style.display = 'none';
		y.style.display = 'none';
		x.style.display = 'none';
		u.style.display = "none";
	}
}

// Pagination variables
    const rowsPerPage = 10;
    let currentPage = 1;
    const totalPages = Math.ceil(data.length / rowsPerPage);

    // DOM Elements
    const tableBody = document.querySelector('#tabl td');
    const prevPageBtn = document.getElementById('prevPage');
    const nextPageBtn = document.getElementById('nextPage');
    const pageInfo = document.getElementById('pageInfo');
    //const downloadCsvBtn = document.getElementById('downloadCsv');
    const exportPdfBtn = document.getElementById('exportPdf');
    
  // Get the dropdown button and the dropdown menu
const downloadBtn = document.getElementById('downloadBtn');
const dropdownOptions = document.getElementById('dropdownOptions');

// Toggle the dropdown menu when the button is clicked
downloadBtn.addEventListener('click', function(event) {
    event.stopPropagation(); // Prevent the click from bubbling up to the window
    dropdownOptions.classList.toggle('show');
});

// Close the dropdown if the user clicks outside of it
window.addEventListener('click', function(event) {
    if (!event.target.matches('#downloadBtn')) {
        if (dropdownOptions.classList.contains('show')) {
            dropdownOptions.classList.remove('show');
        }
    }
});

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
  
    // Function to render table data
    function renderTable(page) {
        tableBody.innerHTML = '';
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const paginatedData = data.slice(start, end);

        paginatedData.forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${row.id}</td>
                <td>${row.issuingBody}</td>
                <td>${row.cargoOrigin}</td>
                <td>${row.shipmentRoute}</td>
                <td>${row.certificateNo}</td>
                <td>${row.customsDeclNo}</td>
                <td>${row.importerName}</td>
                <td>${row.importerContact}</td>
                <td>${row.exporterName}</td>
                <td>${row.agentName}</td>
                <td>${row.agentContact}</td>
                <td>${row.transportMode}</td>
                <td>${row.transporterName}</td>
                <td>${row.vehicleNumber}</td>
                <td>${row.fobCurrency}</td>
                <td>${row.fobValue}</td>
                <td>${row.incoterm}</td>
                <td>${row.freightCurrency}</td>
                <td>${row.freightValue}</td>
                <td>${row.validationNotes}</td>
                <td>${row.status}</td>
                <td>${row.date}</td>
            `;
            tableBody.appendChild(tr);
        });

        // Update pagination info
        pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;

        // Update button states
        prevPageBtn.classList.toggle('disabled', currentPage === 1);
        nextPageBtn.classList.toggle('disabled', currentPage === totalPages);
    }

    // Event listeners for pagination buttons
    prevPageBtn.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            renderTable(currentPage);
        }
    });

    nextPageBtn.addEventListener('click', () => {
        if (currentPage < totalPages) {
            currentPage++;
            renderTable(currentPage);
        }
    });
        /*
            create a simple event handler that fires off an ajax
            request and rebuilds the displayed HTML with the returned
            data.
        */
        document.querySelector('input[type="submit"]').addEventListener('click',e=>{
            
            e.preventDefault();
            
            let fd=new FormData( document.forms.search );
            
            fetch( location.href,{ method:'post', body:fd } )
                .then(r=>r.text())
                .then(html=>{
                    document.querySelector('table#tabl tbody').innerHTML=html
                })
        });
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

// Close the menu and profile dropdown when clicking outside
window.addEventListener('click', function(event) {
    // Close side menu if clicked outside
    if (!document.querySelector('.side-nav').contains(event.target) &&
        !document.querySelector('.hamburger').contains(event.target)) {
        document.getElementById('side-menu-toggler').checked = false;
    }

    // Close profile menu if clicked outside
    if (!document.querySelector('.admin-profile').contains(event.target)) {
        document.getElementById('profile-menu-toggler').checked = false;
    }
});
document.onclick = function(e){
            if (!menu_icon_box.contains(e.target) && !box.contains(e.target) ) {
                menu_icon_box.classList.remove("active");
                box.classList.remove("active_box");
            }
        }
    
