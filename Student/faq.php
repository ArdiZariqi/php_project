<!DOCTYPE html>
<html>
<head>
    <title>Menyja - Pyetje të shpeshta</title>
</head>
<body>
    <h1>FAQ - Pyetje të shpeshta</h1>
    
    <h2>Pyetje të shpeshta</h2>
    <ul id="faq-list">
        <?php
        // Fetching and displaying existing questions/answers from the database
        $faqData = getFAQData(); // Assuming you have a function to retrieve FAQ data from the database
        
        foreach ($faqData as $faq) {
            echo '<li>
                    <h3>' . $faq['question'] . '</h3>
                    <p>' . $faq['answer'] . '</p>
                </li>';
        }
        ?>
    </ul>
    
    <h2>Regjistro pyetjen tënde</h2>
    <form id="question-form" method="post" action="submit_question.php">
        <label for="name">Emri:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Emaili:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="question">Pyetja:</label>
        <textarea id="question" name="question" required></textarea><br><br>
        
        <button type="submit">Dërgo</button>
    </form>
</body>
</html>
