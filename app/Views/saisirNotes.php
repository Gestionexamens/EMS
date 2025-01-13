<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=gestion_examens', 'root', '');

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $examId = $_POST['exam'];
    $studentId = $_POST['student'];
    $grade = $_POST['grade'];

    // Validation simple des données
    if ($examId && $studentId && $grade >= 0 && $grade <= 20) {
        // Préparer la requête d'insertion
        $stmt = $pdo->prepare("INSERT INTO grades (exam_id, student_id, grade) VALUES (?, ?, ?)");
        $stmt->execute([$examId, $studentId, $grade]);

        // Afficher un message de succès
        echo "<p>Note enregistrée avec succès.</p>";
    } else {
        // Afficher un message d'erreur si les données sont invalides
        echo "<p>Erreur : Veuillez vérifier les données saisies.</p>";
    }
}

// Récupérer les étudiants et examens depuis la base de données
$studentsQuery = $pdo->query("SELECT * FROM students");
$students = $studentsQuery->fetchAll(PDO::FETCH_ASSOC);

$examsQuery = $pdo->query("SELECT * FROM exams");
$exams = $examsQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie des notes des étudiants</title>
    <link rel="stylesheet" href="styles.css"> <!-- Lien vers le fichier CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        select, input, button {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            border: none;
        }

        button:hover {
            background-color: #218838;
        }

        p {
            text-align: center;
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Saisie des notes des étudiants</h1>

        <!-- Formulaire pour saisir les notes -->
        <form action="saisirNotes.php" method="POST">
            <label for="exam">Choisir l'examen :</label>
            <select name="exam" id="exam" required>
                <option value="">Sélectionner un examen</option>
                <?php foreach ($exams as $exam): ?>
                    <option value="<?= $exam['id'] ?>"><?= htmlspecialchars($exam['name']) ?></option>
                <?php endforeach; ?>
            </select>

            <label for="student">Choisir l'étudiant :</label>
            <select name="student" id="student" required>
                <option value="">Sélectionner un étudiant</option>
                <?php foreach ($students as $student): ?>
                    <option value="<?= $student['id'] ?>"><?= htmlspecialchars($student['name']) ?></option>
                <?php endforeach; ?>
            </select>

            <label for="grade">Note :</label>
            <input type="number" name="grade" id="grade" min="0" max="20" step="0.1" required>

            <button type="submit">Enregistrer la note</button>
        </form>
    </div>
</body>
</html>
