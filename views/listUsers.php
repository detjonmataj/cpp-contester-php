<h1 class="center">Users</h1>

<div class="table-container">
    <?php if (Application::$APP->getUser()->isAdmin()): ?>
        <div class="table-actions">
            <a href="/users/create" class="btn btn-primary">Create</a>
        </div>
    <?php endif; ?>
    <table class="table" id="users-table">

        <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>User Level</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        </tbody>

    </table>
</div>
