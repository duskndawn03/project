<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Schema</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        h2 {
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Database Schema</h1>
    <?php foreach ($schema as $tableName => $fields): ?>
        <h2>Table: <?= esc($tableName) ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Field Name</th>
                    <th>Type</th>
                    <th>Max Length</th>
                    <th>Primary Key</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fields as $field): ?>
                    <tr>
                        <td><?= esc($field->name) ?></td>
                        <td><?= esc($field->type) ?></td>
                        <td><?= esc($field->max_length ?? 'N/A') ?></td>
                        <td><?= $field->primary_key ? 'Yes' : 'No' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach; ?>
</body>
</html>
