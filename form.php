<!DOCTYPE html>
<html lang="ja">
	<head>
		<title>Ajaxコメントフォームの作成</title>
		<meta charset="utf-8">

		<style>
		.btn {
			height: 30px;
			padding-left: 20px;
			padding-right: 20px;
			color: #fff;
			font-weight: bolder;
			border: #1e90ff 1px solid;
			background: #1e90ff;
			font-size: 14px;
			line-height: 1;
		}
		#nameError {
			color: red;
		}
		#commentError {
			color: red;
		}
		</style>

		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script>
		$(function () {
			$.get('comment.php',
				function (data) {
					$("#commentList").html(data);
					$("input[name=name]").val("");
					$("textarea[name=comment]").val("");
				}
			);
			$(".btn").click(function(){
				$("#nameError").html("");
				$("#commentError").html("");
				var name = $("input[name=name]").val();
				var comment  = $("textarea[name=comment]").val();
				var errorexist = false;
				if (name === "")
				{
					$("#nameError").html("お名前を入力して下さい。");
					errorexist = true;
				} 
				if (comment === "")
				{
					$("#commentError").html("コメントを入力して下さい。");
					errorexist = true;
				} 

				if (!errorexist)
				{
				$.post('post.php',
					{
						"name": name,
						"comment": comment,
					},
					function (data) {
						$.get('comment.php',
							function (data) {
								$("#commentList").html(data);
								$("input[name=name]").val("");
								$("textarea[name=comment]").val("");
							}
						);
					}
				);
				}
			});
		});
		</script>
	</head>
	<body>
		<h3>コメント</h3>
		<form>
			お名前:<br>
			<input type="text" name="name"><br>
			<div id="nameError"></div>
			コメント:<br>
			<textarea  name="comment" rows="7" cols="40"></textarea><br>
			<div id="commentError"></div>
			<button name="transmission" type="button" class="btn">送信</button>
		</form>
		<h3>コメント一覧</h3>
		<p id="commentList">コメントはありません。</p>
	</body>
</html>
