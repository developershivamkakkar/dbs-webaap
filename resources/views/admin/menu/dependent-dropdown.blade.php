@extends('admin/layouts/app')

@section('main')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Page Editor</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Page Editor</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div id="session-alert" class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Page Editor</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('page.show') }}" id="pageEditorForm" class="form-inline">
                                    <div class="form-group mb-4">
                                        <label for="parentMenu" class="font-weight-bold mr-2">Parent Menu Item</label>
                                        <select id="parentMenu" name="parent_menu" class="form-control form-control-sm">
                                            <option value="">Select a menu item</option>
                                            @foreach ($menu_items as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="subMenu" class="mr-2 font-weight-bold mx-3">Sub Menu Item</label>
                                        <select id="subMenu" name="sub_menu" class="form-control form-control-sm">
                                            <option value="">Select a submenu item</option>
                                        </select>
                                    </div>
                                    <button type="submit" id="loadContent"
                                        class="btn btn-primary btn-sm mx-3 mb-4">Load</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('parentMenu').addEventListener('change', function() {
            // This line adds an event listener to the HTML element with the ID 'parentMenu'.
            // The event listener listens for the 'change' event, which occurs when the user selects
            // a different option in the dropdown menu.
            // The function inside the event listener is called when the 'change' event happens.

            let parent_id = this.value;
            // The `this.value` refers to the value of the currently selected option in the 'parentMenu' dropdown.
            // This value represents the `id` of the parent menu item that the user has selected.
            // The `parent_id` variable now holds this value.

            let subMenu = document.getElementById('subMenu');
            // This line selects the HTML element with the ID 'subMenu'.
            // This is the dropdown menu where we will dynamically populate the submenu options
            // based on the selected parent menu item.

            // Clear existing options
            subMenu.innerHTML = '<option value="">Select a Submenu item</option>';
            // This line clears any existing options in the 'subMenu' dropdown.
            // It resets the dropdown to a single default option: 'Select a Submenu item'.
            // This is important to ensure that old options are removed before adding new ones.

            if (parent_id == '') {
                return;
            }
            // This conditional statement checks if the user has not selected any parent menu item.
            // If `parent_id` is an empty string (i.e., the user didn't select anything), the function stops here (`return;`).
            // No fetch request will be made if no valid parent menu item is selected.

            fetch('sub-menus/' + parent_id, {
                    method: "GET"
                })
                // The `fetch` function is used to make an HTTP request to the server.
                // In this case, we are making a GET request to the URL `'sub-menus/' + parent_id`.
                // This URL will typically trigger a route on the server that returns submenu items for the selected parent menu.
                // For example, if `parent_id` is 3, the URL would be `'sub-menus/3'`.

                .then(response => response.json())
                // Once the fetch request is completed, the `.then` method is used to handle the response.
                // The `response.json()` method parses the response data (which is in JSON format) into a JavaScript object.
                // This parsed object, which represents the submenu items, is passed to the next `.then` method.

                .then(subMenus => {
                    // The `subMenus` variable now holds the JSON object returned from the server,
                    // which contains the submenu items as key-value pairs (where keys are submenu IDs and values are submenu names).

                    // Check if subMenus is not empty
                    if (Object.keys(subMenus).length > 0) {
                        // `Object.keys(subMenus)` returns an array of the keys (i.e., submenu IDs) in the `subMenus` object.
                        // If the length of this array is greater than 0, it means there are submenu items available.

                        for (let id in subMenus) {
                            // This `for...in` loop iterates over each key (i.e., submenu ID) in the `subMenus` object.

                            let option = document.createElement('option');
                            // This line creates a new `<option>` element.
                            // This `<option>` element will be added to the 'subMenu' dropdown.

                            option.value = id;
                            // The `option.value` is set to the current submenu ID (`id`).
                            // This is the value that will be submitted when the user selects this submenu item.

                            option.textContent = subMenus[id];
                            // The `option.textContent` is set to the submenu name, which is the value associated with the submenu ID.
                            // This is the text that the user will see in the dropdown.

                            subMenu.appendChild(option);
                            // The `appendChild()` method adds the newly created `<option>` element to the 'subMenu' dropdown.
                        }
                    } else {
                        subMenu.innerHTML = '<option value="">No Submenu items available</option>';
                        // If the `subMenus` object is empty (i.e., no submenu items were returned by the server),
                        // this line replaces the content of the 'subMenu' dropdown with a single option that says,
                        // "No Submenu items available".
                    }
                })

                .catch(error => console.error('Error:', error));
            // The `.catch` method is used to handle any errors that occur during the fetch request.
            // If there's an error (e.g., network issues, server issues), it will be logged to the console.
        });
    </script>
@endsection
