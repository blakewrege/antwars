#!/usr/bin/env sh
./playgame.py --log_error --log_output --log_input -So --player_seed 42 --end_wait=0.25 --verbose --log_dir game_logs --turns 200  --map_file maps/example/tutorial1.map "$@" \
	"python3 python3/MyBot.py3" \
	"python3 python3/MyBotnew.py3" |
java -jar visualizer.jar

#"python sample_bots/python/HunterBot.py" \
#"php testarena/HunterBot.php" |

	#"php testarena/MyBotnew.php" \
	#"php testarena/MyBot.php" |


# tail -f game_logs/0.bot0.error 