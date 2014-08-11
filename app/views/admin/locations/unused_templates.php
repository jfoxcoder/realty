<script id="edit-region-template" type="text/x-handlebars-template">
    <li data-region="{{ id }}" class="location-editor location-region" >
        <header>{{ name }}</header>
        <!--<section>-->
        <!--<input type="text" value={{ name }} />-->
        <!--</section>-->
        <!--<footer></footer>-->
    </li>
</script>

<script id="edit-town-template" type="text/x-handlebars-template">
    <li data-town="{{ id }}" class="location-editor location-town" >Editing {{ name }}</li>
</script>

<script id="edit-suburb-template" type="text/x-handlebars-template">
    <li data-suburb="{{ id }}" class="location-editor location-suburb" >Editing {{ name }}</li>
</script>

<!-- region -->
<script id="region-template" type="text/x-handlebars-template">
    <li data-region="{{ id }}" class="location-region">{{ name }}</li>
</script>

<!-- town -->
<script id="town-template" type="text/x-handlebars-template">
    <li data-town="{{ id }}" class="location-town">{{ name }}</li>
</script>

<!-- suburb -->
<script id="suburb-template" type="text/x-handlebars-template">
    <li data-suburb="{{ id }}" class="location-suburb">{{ name }}</li>
</script>

