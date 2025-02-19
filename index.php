<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emulação de Prova de Tiro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #121212;
            color: white;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }
        button {
            background-color: #ff5722;
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            margin: 10px 0;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #e64a19;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 16px;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Emulação de Prova baseado na Cartilha de Armamento e Tiro</h2>
        <p>Site criado pela Consultoria MR, desenvolvido por Michael Reis</p>
        
        <div id="start-screen">
            <p>Digite seu nome para começar:</p>
            <input type="text" id="username" placeholder="Seu nome">
            <button onclick="startQuiz()">Começar</button>
        </div>
        
        <div id="quiz-screen" class="hidden">
            <h3 id="question"></h3>
            <button onclick="answer(true)">Sim</button>
            <button onclick="answer(false)">Não</button>
            <p id="feedback"></p>
        </div>
    </div>

    <script>
        const questions = [
            { text: "A arma de fogo deve ser sempre tratada como se estivesse carregada?", answer: true },
            { text: "É permitido testar a trava de segurança acionando o gatilho?", answer: false },
            { text: "Deixar a arma apontada para um local seguro é uma regra básica de segurança?", answer: true },
            { text: "Munições velhas ou recarregadas são confiáveis?", answer: false },
            { text: "O uso de óculos protetores e abafadores de ruído é opcional?", answer: false },
            { text: "Uma arma de alma raiada tem sulcos no interior do cano para estabilizar o projétil?", answer: true },
            { text: "Revólveres possuem carregadores destacáveis como pistolas?", answer: false },
            { text: "A espoleta é um dos componentes da munição?", answer: true },
            { text: "Um fuzil pode ser considerado uma arma curta?", answer: false },
            { text: "A limpeza periódica da arma aumenta sua vida útil?", answer: true },
            { text: "As armas automáticas disparam apenas um tiro por acionamento do gatilho?", answer: false },
            { text: "A munição original é mais confiável do que munição recarregada?", answer: true },
            { text: "A trava de segurança da arma substitui o bom senso no manuseio?", answer: false },
            { text: "A alma do cano pode ser lisa ou raiada?", answer: true },
            { text: "A pistola é um tipo de arma longa?", answer: false },
            { text: "Todas as armas de fogo possuem o mesmo calibre?", answer: false },
            { text: "O engatilhamento manual é necessário em armas de ação simples?", answer: true },
            { text: "As regras de segurança não precisam ser seguidas no estande de tiro?", answer: false },
            { text: "O treinamento prático é obrigatório para aprovação no exame de tiro?", answer: true },
            { text: "Armas de alma lisa são utilizadas para disparos de precisão?", answer: false },
            { text: "O coldreamento da arma deve ser feito com cuidado e segurança?", answer: true },
            { text: "O porte de arma deve estar sempre acompanhado de documentação válida?", answer: true },
            { text: "Armas de repetição exigem que o atirador execute manualmente o recarregamento?", answer: true },
            { text: "Os calibres de armas de fogo são padronizados mundialmente?", answer: false }
        ];
        
        let username = "";
        
        function startQuiz() {
            username = document.getElementById("username").value.trim();
            if (username === "") {
                alert("Por favor, digite seu nome para começar.");
                return;
            }
            document.getElementById("start-screen").classList.add("hidden");
            document.getElementById("quiz-screen").classList.remove("hidden");
            nextQuestion();
        }
        
        function nextQuestion() {
            let randomIndex = Math.floor(Math.random() * questions.length);
            document.getElementById("question").textContent = questions[randomIndex].text;
            document.getElementById("feedback").textContent = "";
        }
        
        function answer(userAnswer) {
            let currentQuestion = document.getElementById("question").textContent;
            let questionObj = questions.find(q => q.text === currentQuestion);
            if (questionObj && userAnswer === questionObj.answer) {
                document.getElementById("feedback").textContent = "✅ Correto!";
            } else {
                document.getElementById("feedback").textContent = "❌ Errado!";
            }
            setTimeout(nextQuestion, 2000);
        }
    </script>
</body>
</html>
