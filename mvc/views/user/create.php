{{ include('layouts/header.php', {title: 'Registration'})}}

<div class="container">
    {% if errors is defined %}
    <div class="error">
        <ul>
            {% for error in errors %}
            <li>{{ error }}</li>
            {% endfor %}
        </ul>
    </div>
    {% endif %}
    <form method="post">
        <h2>Registration</h2>
        <label>Name
            <input type="text" name="nom" value="{{ user.nom}}">
        </label>
        <label>Username
            <input type="email" name="username" value="{{ user.username}}">
        </label>
        <label>Password
            <input type="password" name="mot_de_passe">
        </label>
        <label>Email
            <input type="email" name="email" value="{{ user.email}}">
        </label>
        <label>
            Privilege
            <select name="privilege_stampee_id">

                {% for privilege in privileges %}
                {% if privilege.privilege == "user"%}
                <option value="{{ privilege.id }}" {% if privilege.id == user.privilege_id %} selected {% endif %}>
                    {{ privilege.privilege }}</option>
                {% endif %}
                {% endfor %}
            </select>
        </label>
        <input type="submit" class="btn" value="Save">
    </form>
</div>
{{ include('layouts/footer.php')}}