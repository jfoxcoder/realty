
<!-- foundation reveal modal template to edit a region -->
<script id="edit-region-modal-template" type="text/template">
    <div id="edit-region-modal" class="tiny reveal-modal" data-reveal="data-reveal" data-region="<%= id %>">
        <h2><%= name %></h2>

        <form>
            <label for="edit-region">Name</label>
            <input id="edit-region"
                   name="edit-region"
                   type="text"
                   value="<%= name %>"
                   placeholder="Region name, eg Canterbury."
                   autofocus="autofocus"
                   autocomplete="off" />

            <input type="submit" id="edit-region-save-btn" class="small success button right" value="Save Changes"></input>
        </form>


        <a class="close-reveal-modal">&#215;</a>
    </div>
</script>



<!-- foundation reveal modal template to create a region -->
<script id="create-region-modal-template" type="text/template">
    <div id="create-region-modal" class="tiny reveal-modal" data-reveal="data-reveal">
        <h2>Create Region</h2>

        <form>
            <label for="create-region">Name</label>
            <input id="create-region"
                   name="create-region"
                   type="text"
                   placeholder="Region name, eg Canterbury."
                   autofocus="autofocus"
                   autocomplete="off" />

            <input type="submit" id="create-region-save-btn" class="small success button right" value="Create Region"></input>
        </form>


        <a class="close-reveal-modal">&#215;</a>
    </div>
</script>



<!-- foundation reveal modal template to delete a region -->
<script id="delete-region-modal-template" type="text/template">
    <div id="delete-region-modal" class="tiny reveal-modal" data-reveal="data-reveal">
        <h2>Delete Region</h2>

        <form>
            <p>Are you sure you want to delete <strong><%= name %></strong>?</p>

            <input type="submit"
                   id="delete-region-confirm-btn"
                   class="small alert button right"
                   value="Confirm Delete"
                   title="Permanently delete <%= name %>"></input>
        </form>

        <a class="close-reveal-modal">&#215;</a>
    </div>
</script>
































<script id="edit-town-modal-template" type="text/template">
    <div id="edit-town-modal" class="tiny reveal-modal" data-reveal="data-reveal" data-town="<%= id %>">
        <h2><%= name %></h2>

        <form>
            <label for="edit-town">Name</label>
            <input id="edit-town"
                   name="edit-town"
                   type="text"
                   value="<%= name %>"
                   placeholder="Town name, eg Christchurch."
                   autofocus="autofocus"
                   autocomplete="off" />

            <input type="submit" id="edit-town-save-btn" class="small success button right" value="Save Changes"></input>
        </form>


        <a class="close-reveal-modal">&#215;</a>
    </div>
</script>



<!-- foundation reveal modal template to create a town -->
<script id="create-town-modal-template" type="text/template">
    <div id="create-town-modal" class="tiny reveal-modal" data-reveal="data-reveal">
        <h2>Create Town</h2>

        <form>
            <label for="create-town">Name</label>
            <input id="create-town"
                   name="create-town"
                   type="text"
                   placeholder="Town name, eg Christchurch."
                   autofocus="autofocus"
                   autocomplete="off" />

            <input type="submit" id="create-town-save-btn" class="small success button right" value="Create Town"></input>
        </form>


        <a class="close-reveal-modal">&#215;</a>
    </div>
</script>



<!-- foundation reveal modal template to delete a town -->
<script id="delete-town-modal-template" type="text/template">
    <div id="delete-town-modal" class="tiny reveal-modal" data-reveal="data-reveal">
        <h2>Delete Town</h2>

        <form>
            <p>Are you sure you want to delete <strong><%= name %></strong>?</p>

            <input type="submit"
                   id="delete-town-confirm-btn"
                   class="small alert button right"
                   value="Confirm Delete"
                   title="Permanently delete <%= name %>"></input>
        </form>

        <a class="close-reveal-modal">&#215;</a>
    </div>
</script>















<script id="edit-suburb-modal-template" type="text/template">
    <div id="edit-suburb-modal" class="tiny reveal-modal" data-reveal="data-reveal" data-suburb="<%= id %>">
        <h2><%= name %></h2>

        <form>
            <label for="edit-suburb">Name</label>
            <input id="edit-suburb"
                   name="edit-suburb"
                   type="text"
                   value="<%= name %>"
                   placeholder="Suburb name, eg Dallington."
                   autofocus="autofocus"
                   autocomplete="off" />

            <input type="submit" id="edit-suburb-save-btn" class="small success button right" value="Save Changes"></input>
        </form>


        <a class="close-reveal-modal">&#215;</a>
    </div>
</script>



<!-- foundation reveal modal template to create a suburb -->
<script id="create-suburb-modal-template" type="text/template">
    <div id="create-suburb-modal" class="tiny reveal-modal" data-reveal="data-reveal">
        <h2>Create Suburb</h2>

        <form>
            <label for="create-suburb">Name</label>
            <input id="create-suburb"
                   name="create-suburb"
                   type="text"
                   placeholder="Suburb name, eg Dallington."
                   autofocus="autofocus"
                   autocomplete="off" />

            <input type="submit" id="create-suburb-save-btn" class="small success button right" value="Create Suburb"></input>
        </form>


        <a class="close-reveal-modal">&#215;</a>
    </div>
</script>



<!-- foundation reveal modal template to delete a suburb -->
<script id="delete-suburb-modal-template" type="text/template">
    <div id="delete-suburb-modal" class="tiny reveal-modal" data-reveal="data-reveal">
        <h2>Delete Suburb</h2>

        <form>
            <p>Are you sure you want to delete <strong><%= name %></strong>?</p>

            <input type="submit"
                   id="delete-suburb-confirm-btn"
                   class="small alert button right"
                   value="Confirm Delete"
                   title="Permanently delete <%= name %>"></input>
        </form>

        <a class="close-reveal-modal">&#215;</a>
    </div>
</script>






