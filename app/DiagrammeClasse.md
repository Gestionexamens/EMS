# Diagramme de Classe

Voici le diagramme de classe de notre application :

```mermaid
classDiagram
    class User {
        +int id
        +string nom
        +string prenom
        +string role
        +string cne
        +string cni
        +string dateNaissance
        +inscription()
    }

    class Account {
        +int id
        +string email
        +string password
    }

    class Role {
        +Etudiant
        +Prof
    }

    User --> Account : "possède un" 
    Account --> Role : "a un rôle"
    
    %% Relation pour le rôle étudiant et professeur
    User : +string cne (visible si rôle = "Etudiant")
    User : +string cni (visible si rôle = "Prof")
    User : +string dateNaissance (visible si rôle = "Etudiant")

    %% Cardinalités
    User "1" --> "1" Account : "possède un"
    Account "1" --> "1" Role : "a un rôle"



 ```mermaid
 classDiagram
    class SaisieNote {
        +int id
        +int idProfesseur
        +int idModule
        +Date dateSaisie
        +validerNote()
        +annulerSaisie()
    }

    class Etudiant {
        +int id
        +string nom
        +string prenom
        +string cne
        +Date dateNaissance
        +getNotes()
    }

    class Professeur {
        +int id
        +string nom
        +string prenom
        +string cin
        +assignerNote()
    }

    class Module {
        +int id
        +string nom
        +int coefficient
        +getExams()
    }

    class Note {
        +int id
        +int valeur
        +Date dateNote
        +int idEtudiant
        +int idModule
        +saisirNote()
    }

    Professeur "1" --> "*" SaisieNote : valide
    Etudiant "1" --> "*" Note : a
    Module "1" --> "*" Note : contient
    Module "1" --> "*" SaisieNote : concerne
    SaisieNote "1" --> "*" Note : saisie

