

<form hx-post="process-booking" id="form">
    <label>name</label>
    <input type="text" name="name" required>
    
    <label>address</label>
    <input type="text" name="address" required>

    <label>description</label>
    <input type="text" name="description">

    <label>time and date</label>
    <input type="datetime-local" name="datetime" required>
    
    <label>Vet</label>
    <input type="text" name="vet" >

    <input type="submit" value="submit">
    
</form>