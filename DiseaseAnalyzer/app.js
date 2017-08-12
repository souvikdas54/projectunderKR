var app = angular.module('quizApp', []);

app.directive('quiz', function(quizFactory) {
	return {
		restrict:'AE',
		scope: {},
		templateUrl: 'template.html',
		link: function(scope, elem, attrs) {
			scope.start = function() {
				scope.id = 0;
				scope.quizOver = false;
				scope.inProgress = true;
				scope.getQuestion();
			};

			scope.reset = function() {
				scope.inProgress = false;
				scope.score = 0;
			}

			scope.getQuestion = function() {
				var q = quizFactory.getQuestion(scope.id);
				if(q) {
					scope.question = q.question;
					scope.options = q.options;
					scope.answer = q.answer;
					scope.answerMode = true;
				} else {
					scope.quizOver = true;
				}
			};

			scope.checkAnswer = function() {
				if(!$('input[name=answer]:checked').length) return;

				var ans = $('input[name=answer]:checked').val();

				if(ans == scope.options[scope.answer]) {
					if(scope.id==0)
					{
						scope.score+=10;
					}
					else if(scope.id==1)
					{
						scope.score+=7;
					}
					else if(scope.id==2)
					{
						scope.score+=12;
					}
					else if(scope.id==3)
					{
						scope.score+=2;
					}
					else if(scope.id==4)
					{
						scope.score+=1;
					}
					else{
					scope.score+=49;
				}
					scope.correctAns = true;
				} else {
					scope.correctAns = false;
				}

				scope.answerMode = false;
			};

			scope.nextQuestion = function() {
				scope.id++;
				scope.getQuestion();
			}

			scope.reset();
		}
	}
});

app.factory('quizFactory', function() {
	var questions = [
		{
			question: "Do you have fever?",
			options: ["Yes", "No"],
			answer: 0
		},
		{
			question: "Do you have rash?",
			options: ["Yes", "No"],
			answer: 0
		},
		{
			question: "Do you have body ache?",
			options: ["Yes", "No"],
			answer: 0
		},
		{
			question: "Do you have chills?",
			options: ["Yes", "No"],
			answer: 0
		},
		{
			question: "Do you have headache?",
			options: ["Yes", "No"],
			answer: 0
		},
		{	
			question: "Do you have swollen glands?",
			options: ["Yes", "No"],
			answer: 0
		}
	];

	return {
		getQuestion: function(id) {
			if(id < questions.length) {
				return questions[id];
			} else {
				return false;
			}
		}
	};
});