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
		</style>

		<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
		<script>
		$(function () {
			$(".btn").click(function(){
				var name = $("[name=name]").val();
				var comment  = $("[name=comment]").val();
				$.post('post.php',
					{
						"name": name,
						"comment": comment,
					},
					function (data) {
						console.log(data);
					}
				);
			});
		});
		</script>
	</head>
	<body>
		<h3>コメント</h3>
		<form>
			お名前:<br>
			<input type="text" name="name"><br>
			コメント:<br>
			<textarea  name="comment" rows="7" cols="40"></textarea><br>
			<button name="transmission" class="btn">送信</button>
		</form>
		<h3>コメント一覧</h3>
		<p>コメントはありません。</p>
	</body>
</html>
