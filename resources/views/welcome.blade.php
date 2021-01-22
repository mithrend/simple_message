<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Message API</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            table {
                border-collapse: collapse;
                border: 1px solid #d4d4d4;
            }

            th {
                font-weight: 600;
                border-bottom: 1px solid #d4d4d4;
                background-color: white;
            }

            td {
                padding: 1rem;
            }

            tr:nth-child(2n + 1) {
                background-color: #ececec;
            }
        </style>
    </head>
    <body>
        <div id="container" class="flex-center position-ref full-height">
            Loading...
        </div>
    </body>
<script>
    const fetchMessages = async () => {
        const response = await fetch('/api/messages');
        return await response.json();
    }

    const createTable = messages => {
        if(Array.isArray(messages) && messages.length > 0) {
            const tableData = messages.map(author => author.messages.map(message => (
                `<tr>
                    <td>${stripHTML(author.first_name)} ${stripHTML(author.last_name)}</td>
                    <td>${stripHTML(message.body)}</td>
                    <td>${message.created_at}</td>
                    <td>${message.updated_at}</td>
                </tr>`
            )));

            const tableMarkup = `
                <table>
                    <thead>
                        <tr>
                            <th>Author</th>
                            <th>Message</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${tableData}
                    </tbody>
                </table>
            `;

            document.getElementById('container').innerHTML = tableMarkup;
        } else {
            document.getElementById('container').innerHTML = "No messages found.";
        }
    }

    const loadPage = async () => {
        const messages = await fetchMessages();
        createTable(messages);
    }

    const stripHTML = string => {
        const div = document.createElement('div');
        div.innerHTML = string;
        return div.textContent || div.innerText || "";
    }

    loadPage();
</script>
</html>
